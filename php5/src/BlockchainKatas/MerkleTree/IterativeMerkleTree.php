<?php

namespace BlockchainKatas\MerkleTree;

class IterativeMerkleTree implements MerkleTree
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

        $hashes = [];
        for($i=0;$i<count($chunks);$i++) {
            $hashes[] = $this->h($chunks[$i]);
        }

        while (count($hashes)>=2) {
            $aux = [];
            for($i=0;$i<count($hashes);$i+=2) {
                $aux[] = $this->h($hashes[$i] . $hashes[$i+1]);
            }
            $hashes = $aux;
        }
        return $hashes[0];
    }

    private function h($chunk)
    {
        return call_user_func_array($this->hash, [$chunk]);
    }
}
