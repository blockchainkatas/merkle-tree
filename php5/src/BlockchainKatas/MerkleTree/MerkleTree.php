<?php

namespace BlockchainKatas\MerkleTree;

class MerkleTree
{
    public function calculateMerkleRoot($chunks)
    {
        return $this->h($this->h($chunks[0]) . $this->h($chunks[1]));
    }

    private function h($chunk)
    {
        return $chunk . $chunk;
    }
}