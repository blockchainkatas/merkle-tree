<?php

namespace BlockchainKatas\MerkleTree;

class MerkleTreeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MerkleTree
     */
    protected $merkleTree;

    public function setUp()
    {
        $this->merkleTree = new MerkleTree();
    }
}