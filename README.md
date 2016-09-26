Merkle Tree Kata
================

Kata for implementing a Merkle Tree class:

https://en.wikipedia.org/wiki/Merkle_tree
https://brilliant.org/wiki/merkle-tree/

A Merkle Tree is a data structure used by Bitcoin and other P2P systems.

# Requirements

## Iteration 1: 

* We need to send a document to a recipient.
* A document can be a string of any length.
* We want to split the document in chunks of N characters and send each chunk separately.
* Given the array of chunks (array of strings) we want to calculate the the merkle root.

## Iteration 2: 

* The initial array of chunks is very big and we want to build the tree passing one chuck at a time.

## Iteration 3:

* Given a MerkleTree and a chunk we want to check if that chunk is valid.

## Iteration 4:

* We want to validate a chunk without using the entire MerkleTree. We want to calculate the minimum branch needed 
to validate a chunk, and use that branch to validate a chunk.