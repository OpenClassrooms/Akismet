<?php


namespace OpenClassrooms\Akismet\Services;

use PHPUnit_Framework_MockObject_MockObject;

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
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    private $clientMock;

    /**
     * @test
     */
    public function verifyKey()
    {
        $this->clientMock->expects($this->once())
            ->method('send')
            ->willReturn('valid');

        $response = $this->akismetService->verifyKey(self::KEY, self::BLOG_URL);

        $this->assertTrue($response);
    }

    /**
     * @test
     */
    public function commentCheck()
    {
        $this->clientMock->expects($this->once())
            ->method('send')
            ->willReturn('true');

        $userIp = '127.0.0.1';
        $userAgent = 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6';
        $referrer = 'http://www.google.com';
        $permalink = 'http://yourblogdomainname.com/blog/post=1';
        $commentType = 'comment';
        $commentAuthor = 'admin';
        $commentAuthorEmail = 'test@test.com';
        $commentAuthorUrl = 'http://www.CheckOutMyCoolSite.com';
        $commentContent = 'It means a lot that you would take the time to review our software.  Thanks again.';

        $response = $this->akismetService->commentCheck(
            $userIp,
            $userAgent,
            $referrer,
            $permalink,
            $commentType,
            $commentAuthor,
            $commentAuthorEmail,
            $commentAuthorUrl,
            $commentContent
        );

        $this->assertTrue($response);
    }

    protected function setUp()
    {
        $this->clientMock = $this->getMockBuilder('OpenClassrooms\Akismet\Client\Client')
            ->disableOriginalConstructor()
            ->getMock();

        $this->akismetService = new AkismetServiceImpl();
        $this->akismetService->setClient($this->clientMock);
    }
}
