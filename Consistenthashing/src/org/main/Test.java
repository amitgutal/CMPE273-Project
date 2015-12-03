package org.main;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileWriter;
import java.io.IOException;
import java.io.Writer;
import java.net.UnknownHostException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;
import java.util.List;
import java.util.Map.Entry;
import java.util.Scanner;

import org.apache.log4j.Logger;
import org.apache.poi.hssf.usermodel.HSSFCell;
import org.apache.poi.hssf.usermodel.HSSFRow;
import org.apache.poi.hssf.usermodel.HSSFSheet;
import org.apache.poi.hssf.usermodel.HSSFWorkbook;

import redis.clients.jedis.Jedis;

import com.google.common.hash.HashFunction;
import com.google.common.hash.Hashing;

public class Test {
	private static Logger log = Logger.getLogger(Test.class);

	public static void main(String[] args) throws UnknownHostException, IOException {
		log.debug("Loggin.....");
		Scanner ipaddr = new Scanner(new File(args[0]));
		ArrayList<String> al = new ArrayList<String>();
		while (ipaddr.hasNext()){
			al.add(ipaddr.next());
		}
		ipaddr.close();
		HashMap<String, Integer> hmap = new HashMap();

		String filename = "data.xls";
		List sheetData = new ArrayList();
		FileInputStream fis = null;
		try {

			fis = new FileInputStream(filename);
			HSSFWorkbook workbook = new HSSFWorkbook(fis);
			HSSFSheet sheet = workbook.getSheetAt(0);
			Iterator rows = sheet.rowIterator();
			while (rows.hasNext()) {
				HSSFRow row = (HSSFRow) rows.next();
				Iterator cells = row.cellIterator();
				List data = new ArrayList();
				while (cells.hasNext()) {
					HSSFCell cell = (HSSFCell) cells.next();
					data.add(cell);
				}
				sheetData.add(data);
			}
		} catch (IOException e) {
			e.printStackTrace();
		} finally {
			if (fis != null) {
				fis.close();
			}
		}
		HashFunction hf = Hashing.md5();
		ConsistentHash<String> consistentHash = new ConsistentHash<String>(hf, 100, al); 
		for (int i = 0; i < sheetData.size(); i++) {
			List list = (List) sheetData.get(i);
			HSSFCell cell1 = (HSSFCell) list.get(0);
			HSSFCell cell2 = (HSSFCell) list.get(1);
			String key = cell1.getStringCellValue().toString();
			String value = cell2.getStringCellValue().toString();
			log.info(key + " is mapped to Redis server: "+ consistentHash.get(key));
			String  temp = consistentHash.get(key);
			System.out.println("Temp variable is :" + temp);
			String temp1 = temp.substring(0, temp.indexOf(":"));
			if(hmap.containsKey(temp))
				hmap.put(temp, hmap.get(temp) + 1);
			else
				hmap.put(temp, 1);
			int temp2 = Integer.parseInt(temp.substring(temp.indexOf(":")+1, temp.length()));
			System.out.println(temp1);
			System.out.println(temp2);
			Jedis jedis = new Jedis(temp1,temp2);
			jedis.connect();
			System.out.println("Connected to server" + jedis +  "sucessfully");
			jedis.set(key,value);       
			jedis.disconnect();
		}
		String eol = System.getProperty("line.separator");
		try (Writer writer = new FileWriter("somefile.csv")) {
			writer.append("IP")
			.append(',')
			.append("Value")
			.append(eol);
			for (Entry<String, Integer> entry : hmap.entrySet()) {
				writer.append(entry.getKey())
				.append(',')
				.append(entry.getValue().toString())
				.append(eol);
			}
		} catch (IOException ex) {
			ex.printStackTrace(System.err);
		}
		System.out.println(hmap);
		log.info(hmap);
		log.info("End of the program");
	}
}

