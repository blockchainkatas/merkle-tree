<?php

namespace BlockchainKatas\MerkleTree;

class DynamicMerkleTreeTest extends \PHPUnit_Framework_TestCase
{
    protected $dynamicMerkleTree;

    public function setUp()
    {
        $this->dynamicMerkleTree = new DynamicMerkleTree(function ($value) {
            return sha1($value);
        });
    }

    /** @test */
    public function
    it_should_generate_a_merkle_root_dynamicaly_from_chunks()
    {
        $merkleRootsOfChunks = [
            'A' => 'c381a026e5f16b286917e39982a00b770308cb85',
            'B' => '859572ac3bd09bc4f777a4ce6cb326e3251ee29a',
            'C' => 'c412858d2fb54133535cf4196256ad726e3a6f75',
            'D' => 'c4d69c96bd6d57986a96e95b77ceb96049b3dd8b',
        ];
        foreach ($merkleRootsOfChunks as $chunk => $expectedMerkleRoot) {
            $this->dynamicMerkleTree->addChunk($chunk);
            $merkleRoot = $this->dynamicMerkleTree->calculateMerkleRoot();
            $this->assertEquals($expectedMerkleRoot, $merkleRoot);
        }

    }
}
