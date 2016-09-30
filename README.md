Merkle Tree Kata
================

Kata for implementing a Merkle Tree class:

* https://en.wikipedia.org/wiki/Merkle_tree
* https://brilliant.org/wiki/merkle-tree/

A Merkle Tree is a data structure used by Bitcoin and other P2P systems.

# Requirements

* A document will be represented as an string.
* We want to split the document in chunks of N characters and send each chunk separately.
* We are going to use a Merkle root for document integrity validation.
* We always use a pair number of chunks (leaf nodes in the tree). If the number is odd, we
have to duplicate the last one.

## Iteration 1: 

* We need generate the Merkle root of a document.
* The hash function will be h(x) = xx.

## Iteration 2: 

* Allow changing hash function.

## Iteration 3: 

* The initial array of chunks is very big and we want to build the tree passing one chuck at a time.

## Iteration 4:

* Given a MerkleTree and a chunk we want to check if that chunk is valid.

## Iteration 5:

* We want to validate a chunk without using the entire MerkleTree. We want to calculate the minimum branch needed 
to validate a chunk, and use that branch to validate a chunk.