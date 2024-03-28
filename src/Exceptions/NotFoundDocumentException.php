<?php
/**
 * NotFoundDocumentException
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
 * NotFoundDocumentException
 *
 * @category    Board
 *
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 *
 * @link        https://xpressengine.io
 */
class NotFoundDocumentException extends HttpBoardException
{
    protected $statusCode = Response::HTTP_GONE;

    protected $message = 'board::notFoundDocument';
}
