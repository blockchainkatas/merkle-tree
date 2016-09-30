<?php

namespace BlockchainKatas\MerkleTree;

class MerkleTree
{
    private $hash;

    public function __construct(callable $hash)
    {
        $this->hash = $hash;
    }

    public function calculateMerkleRoot($chunks)
    {
        if (!$chunks) {
            throw new \InvalidArgumentException('Expected not empty array of chunks');
        }

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
        return call_user_func_array($this->hash, [$chunk]);
    }
}