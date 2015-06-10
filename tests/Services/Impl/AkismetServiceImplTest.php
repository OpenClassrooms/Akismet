<?php


namespace OpenClassrooms\Akismet\Services\Impl;

use OpenClassrooms\Akismet\Client\ClientMock;
use OpenClassrooms\Akismet\Models\CommentBuilderImpl;
use OpenClassrooms\Akismet\Models\CommentStub;
use OpenClassrooms\Akismet\Services\AkismetService;

/**
 * Class AkismetServiceImplTest
 *
 * @author Arnaud Lefèvre <arnaud.lefevre@openclassrooms.com>
 */
class AkismetServiceImplTest extends \PHPUnit_Framework_TestCase
{
    const KEY = '123APIKey';
    const BLOG_URL = 'http://www.blogdomainname.com/';

    /**
     * @var AkismetService
     */
    private $akismetService;

    /**
     * @test
     */
    public function commentCheck()
    {
        $commentBuilder = new CommentBuilderImpl();

        $response = $this->akismetService->commentCheck(
            $commentBuilder
                ->create()
                ->withUserIp(CommentStub::USER_IP)
                ->withUserAgent(CommentStub::USER_AGENT)
                ->withAuthorName(CommentStub::AUTHOR_NAME)
                ->withAuthorEmail(CommentStub::AUTHOR_EMAIL)
                ->withContent(CommentStub::CONTENT)
                ->build()
        );

        $this->assertTrue($response);
    }

    protected function setUp()
    {
        $this->akismetService = new AkismetServiceImpl();
        $this->akismetService->setClient(new ClientMock());
    }
}
