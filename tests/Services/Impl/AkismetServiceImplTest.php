<?php


namespace OpenClassrooms\Akismet\Tests\Services\Impl;

use OpenClassrooms\Akismet\Models\Impl\CommentBuilderImpl;
use OpenClassrooms\Akismet\Services\AkismetService;
use OpenClassrooms\Akismet\Services\Impl\AkismetServiceImpl;
use OpenClassrooms\Akismet\Tests\Client\ClientMock;
use OpenClassrooms\Akismet\Tests\Models\CommentStub;

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
                ->withReferrer(CommentStub::REFERRER)
                ->withPermalink(CommentStub::PERMALINK)
                ->withAuthorName(CommentStub::AUTHOR_NAME)
                ->withAuthorEmail(CommentStub::AUTHOR_EMAIL)
                ->withContent(CommentStub::CONTENT)
                ->build()
        );

        $this->assertTrue($response);
        $this->assertEquals(AkismetService::RESOURCE, ClientMock::$resource);
        $this->assertCommentCheckParams();
    }

    protected function setUp()
    {
        $this->akismetService = new AkismetServiceImpl();
        $this->akismetService->setClient(new ClientMock());
        ClientMock::$postReturn = 'true'g;
    }

    private function assertCommentCheckParams()
    {
        $this->assertEquals(CommentStub::USER_IP, ClientMock::$params['user_ip']);
        $this->assertEquals(CommentStub::USER_AGENT, ClientMock::$params['user_agent']);
        $this->assertEquals(CommentStub::REFERRER, ClientMock::$params['referrer']);
        $this->assertEquals(CommentStub::PERMALINK, ClientMock::$params['permalink']);
        $this->assertEquals(CommentStub::AUTHOR_NAME, ClientMock::$params['comment_author']);
        $this->assertEquals(CommentStub::AUTHOR_EMAIL, ClientMock::$params['comment_author_email']);
        $this->assertEquals(CommentStub::CONTENT, ClientMock::$params['comment_content']);
    }
}
