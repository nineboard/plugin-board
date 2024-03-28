<?php
/**
 * RecycleBin
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

namespace Xpressengine\Plugins\Board;

use Xpressengine\Plugins\Board\Components\Modules\BoardModule;
use Xpressengine\Plugins\Board\Models\Board;
use Xpressengine\Trash\RecycleBinInterface;

/**
 * RecycleBin
 *
 * Core Trash 에서 처리될 휴지통 구현체
 *
 * @category    Board
 *
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 *
 * @link        https://xpressengine.io
 */
class RecycleBin implements RecycleBinInterface
{
    /**
     * 휴지통 이름 반환
     *
     * @return string
     */
    public static function name()
    {
        return 'board';
    }

    /**
     * 휴지통 비우기 처리할 때 수행해야 할 코드 입력
     * TrashManager 에서 휴지통 비우기(clean()) 가 처리될 때 사용
     *
     * @return void
     */
    public static function clean()
    {
        /** @var Handler $handler */
        $handler = app('xe.board.handler');
        /** @var ConfigHandler $configManager */
        $configHandler = app('xe.board.config');
        $boards = Board::where('status', 'trash')->where('type', BoardModule::getId())->get();

        $configs = [];
        foreach ($boards as $board) {
            if (isset($configs[$board->instance_id]) === false) {
                $configs[$board->instance_id] = $configHandler->get($board->instance_id);
            }

            // 인스턴스 설정 정보를 찾을 수 없을 경우 삭제할 수 없는 문제 있음
            if (isset($configs[$board->instance_id]) === true) {
                $handler->remove($board, $configs[$board->instance_id]);
            }
        }
    }

    /**
     * 휴지통 패키지에서 각 휴지통의 상태를 알 수 있도록 정보를 반환
     * 휴지통에 얼마만큼의 정보가 있는지 알려주기 위한 인터페이스
     *
     * @return string
     */
    public static function summary()
    {
        $count = Board::where('status', 'trash')->where('type', BoardModule::getId())->count();

        // todo: translation
        return sprintf('휴지통에 %s건의 문서가 있습니다.', $count);
    }
}
