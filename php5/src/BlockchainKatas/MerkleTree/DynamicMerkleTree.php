<?php

namespace BlockchainKatas\MerkleTree;

class DynamicMerkleTree
{
    private $merkleTree;
    private $chunks;

    public function __construct(callable $hash)
    {
        $this->merkleTree = new MerkleTree($hash);
    }

    public function addChunk($chunk)
    {
        $this->chunks[] = $chunk;
    }

    public function calculateMerkleRoot()
    {
        return $this->merkleTree->calculateMerkleRoot($this->chunks);
    }
}
