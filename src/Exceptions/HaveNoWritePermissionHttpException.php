<?php
/**
 * HaveNoWritePermissionHttpException
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

use Xpressengine\Plugins\Board\HttpBoardException;

/**
 * HaveNoWritePermissionHttpException
 *
 * @category    Board
 *
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 *
 * @link        https://xpressengine.io
 */
class HaveNoWritePermissionHttpException extends HttpBoardException
{
    protected $message = 'board::HaveNoWritePermission';
}
