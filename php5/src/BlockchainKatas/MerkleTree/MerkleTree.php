<?php

namespace BlockchainKatas\MerkleTree;

interface MerkleTree
{
    public function calculateMerkleRoot($chunks);
}

