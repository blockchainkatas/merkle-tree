<?php

namespace BlockchainKatas\MerkleTree;

class MerkleTree
{
    public function calculateMerkleRoot($chunks)
    {
        if (count($chunks) % 2) {
            $chunks[] = $chunks[count($chunks) - 1];
        }

        if (count($chunks) == 2) {
            return $this->h($this->h($chunks[0]) . $this->h($chunks[1]));
        }

        $left = array_slice($chunks, 0, count($chunks) / 2);
        $right = array_slice($chunks, count($chunks) / 2);

        return $this->h($this->calculateMerkleRoot($left) . $this->calculateMerkleRoot($right));
    }

    private function h($chunk)
    {
        return $chunk . $chunk;
    }
}