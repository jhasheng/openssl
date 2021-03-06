<?php

/**
 * @author Andreas Treichel <gmblar+github@gmail.com>
 */

namespace Blar\OpenSSL;

use PHPUnit_Framework_TestCase as TestCase;

class PrivateKeyTest extends TestCase {

    public function testEncryptAndDecrypt() {
        $generator = new KeyGenerator();
        $privateKey = $generator->generate();
        $publicKey = $privateKey->getPublicKey();

        $encrypted = $privateKey->encrypt('foobar');
        $this->assertNotSame('foobar', $encrypted);

        $decrypted = $publicKey->decrypt($encrypted);
        $this->assertSame('foobar', $decrypted);
    }

}
