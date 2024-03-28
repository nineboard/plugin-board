<?php
/**
 * BoardData
 *
 * PHP version 7
 *
 * @category    Board
 *
 * @author      XE Team (developers) <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 *
 * @link        https://xpressengine.io
 */

namespace Xpressengine\Plugins\Board\Models;

use Xpressengine\Database\Eloquent\DynamicModel;

/**
 * BoardData
 *
 * @property int favorite_id
 * @property string target_id
 * @property string user_id
 *
 * @category    Board
 *
 * @author      XE Team (developers) <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 *
 * @link        https://xpressengine.io
 */
class BoardFavorite extends DynamicModel
{
    public $timestamps = false;

    protected $primaryKey = 'favorite_id';

    protected $fillable = ['target_id', 'user_id'];
}
