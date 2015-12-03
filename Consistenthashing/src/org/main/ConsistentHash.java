package org.main;

import java.nio.charset.Charset;
import java.util.Collection;
import java.util.SortedMap;
import java.util.TreeMap;

import com.google.common.hash.HashFunction;

public class ConsistentHash<T> {
	private final HashFunction hashFunction;
	private final int numberOfReplicas;
	private final SortedMap<Long, T> circle = new TreeMap<Long, T>();

	public ConsistentHash(HashFunction hashFunction, int numberOfReplicas,
			Collection<T> nodes) {
		this.hashFunction = hashFunction;
		this.numberOfReplicas = numberOfReplicas;
		for (T node : nodes) {
			add(node);
		}
	}

	public void add(T node) {
		circle.put(hashFunction.hashString(node.toString() , Charset.defaultCharset()).asLong(),
				node);
	}

	public void remove(T node) {
		circle.remove(hashFunction.hashString(node.toString(), Charset.defaultCharset()).asLong());
	}

	public T get(Object key) {
		if (circle.isEmpty()) {
			return null;
		}
		long hash = hashFunction.hashString(key.toString(), Charset.defaultCharset()).asLong();
		if (!circle.containsKey(hash)) {
			SortedMap<Long, T> tailMap = circle.tailMap(hash);
			hash = tailMap.isEmpty() ? circle.firstKey() : tailMap.firstKey();
		}
		return circle.get(hash);
	}
}