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

    /** @test */
    public function
    it_should_generate_a_merkle_root_from_two_chunks()
    {
        /**
         * h(h(A) + h(B)) = h(AABB) = AABBAABB
         * h(A) = AA  h(B) = BB
         * A B
         */

        $chunks = ['A', 'B'];
        $merkleRoot = $this->merkleTree->calculateMerkleRoot($chunks);

        $this->assertEquals('AABBAABB', $merkleRoot);
    }
}