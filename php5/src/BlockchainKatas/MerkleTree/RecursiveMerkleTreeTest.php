<?php

namespace BlockchainKatas\MerkleTree;

class RecursiveMerkleTreeTest extends \PHPUnit_Framework_TestCase
{
    use MerkleTreeTest;

    public function setUp()
    {
        $this->merkleTree = new RecursiveMerkleTree([$this, 'merkleTreeHash']);
        $this->merkleTreeAlternativeHash = new RecursiveMerkleTree([$this, 'merkleTreeAlternativeHash']);
    }
}
