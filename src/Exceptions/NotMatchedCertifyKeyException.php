<?php
/**
 * NotMatchedCertifyKeyException
 *
 * PHP version 7
 *
 * @category    Board
 *
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 *
 * @link        https://xpressengine.io
 */

namespace Xpressengine\Plugins\Board\Exceptions;

use Symfony\Component\HttpFoundation\Response;
use Xpressengine\Plugins\Board\HttpBoardException;

/**
 * NotMatchedCertifyKeyException
 *
 * @category    Board
 *
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 *
 * @link        https://xpressengine.io
 */
class NotMatchedCertifyKeyException extends HttpBoardException
{
    protected $message = 'board::notMatchedCertifyKey';

    protected $statusCode = Response::HTTP_UNAUTHORIZED;
}
