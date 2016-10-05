<?php

namespace BlockchainKatas\MerkleTree;

class DynamicMerkleTree
{
    private $hash;
    private $chunks;

    public function __construct(callable $hash)
    {
        $this->hash = $hash;
    }

    public function addChunk($chunk)
    {
        $this->hashes[] = $this->h($chunk);
    }

    public function calculateMerkleRoot()
    {
        $hashes = $this->hashes;
        if (count($hashes) % 2) {
            $hashes[] = $hashes[count($hashes) - 1];
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
