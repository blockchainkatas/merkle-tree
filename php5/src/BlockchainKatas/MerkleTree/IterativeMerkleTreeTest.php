<?php

namespace BlockchainKatas\MerkleTree;

class IterativeMerkleTreeTest extends \PHPUnit_Framework_TestCase
{
    use MerkleTreeTest;

    public function setUp()
    {
        $this->merkleTree = new IterativeMerkleTree([$this, 'merkleTreeHash']);
        $this->merkleTreeAlternativeHash = new IterativeMerkleTree([$this, 'merkleTreeAlternativeHash']);
    }
}
