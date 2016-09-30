<?php

namespace BlockchainKatas\MerkleTree;

use InvalidArgumentException;

class MerkleTreeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MerkleTree
     */
    protected $merkleTree;

    public function setUp()
    {
        $this->merkleTree = new MerkleTree(function ($value) {
            return $value . $value;
        });
    }

    /** @test */
    public function
    it_should_generate_a_merkle_root_from_2_chunks()
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

    /** @test */
    public function
    it_should_generate_a_merkle_root_from_4_chunks()
    {
        /**
         * h(AABBAABB + CCDDCCDD) = h(AABBAABBCCDDCCDD) = AABBAABBCCDDCCDDAABBAABBCCDDCCDD
         * h(h(A) + h(B)) = h(AABB) = AABBAABB  h(h(C) + h(D)) = h(CCDD) = CCDDCCDD
         * h(A) = AA  h(B) = BB                 h(C) = CC  h(D) = DD
         * A  B                                 C  D
         */

        $chunks = ['A', 'B', 'C', 'D'];
        $merkleRoot = $this->merkleTree->calculateMerkleRoot($chunks);

        $this->assertEquals('AABBAABBCCDDCCDDAABBAABBCCDDCCDD', $merkleRoot);
    }

    /** @test */
    public function
    it_should_generate_a_merkle_root_from_3_chunks()
    {
        /**
         * h(AABBAABB + CCCCCCCC) = h(AABBAABBCCCCCCCC) = AABBAABBCCCCCCCCAABBAABBCCCCCCCC
         * h(h(A) + h(B)) = h(AABB) = AABBAABB  h(h(C) + h(C)) = h(CCCC) = CCCCCCCC
         * h(A) = AA  h(B) = BB                 h(C) = CC  h(C) = CC
         * A  B                                 C  C
         */

        $chunks = ['A', 'B', 'C'];
        $merkleRoot = $this->merkleTree->calculateMerkleRoot($chunks);

        $this->assertEquals('AABBAABBCCCCCCCCAABBAABBCCCCCCCC', $merkleRoot);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function
    it_should_fail_generating_a_merkle_root_with_0_chunks()
    {
        $chunks = [];
        $merkleRoot = $this->merkleTree->calculateMerkleRoot($chunks);
    }

    /** @test */
    public function
    it_should_allow_calculate_merkle_root_using_a_different_hash_function()
    {
        $merkleTree = new MerkleTree(function ($value) {
            return $value . 'X';
        });

        /**
         * h(h(A) + h(B)) = h(AXBX) = AXBXX
         * h(A) = AX  h(B) = BX
         * A B
         */

        $chunks = ['A', 'B'];
        $merkleRoot = $merkleTree->calculateMerkleRoot($chunks);

        $this->assertEquals('AXBXX', $merkleRoot);
    }
}