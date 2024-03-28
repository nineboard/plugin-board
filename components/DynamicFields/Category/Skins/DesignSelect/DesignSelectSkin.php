<?php
/**
 * DesignSelectSkin
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

namespace Xpressengine\Plugins\Board\Components\DynamicFields\Category\Skins\DesignSelect;

use App\FieldSkins\Category\DefaultSkin;
use View;
use Xpressengine\Category\Models\Category;
use Xpressengine\Config\ConfigEntity;

/**
 * DesignSelectSkin
 *
 * Category DynamicField 의 기본스킨으로 DesignSelectSkin 사용.
 * register 에 등록되는 id 를 Category 기본스킨으로 해서 이 스킨이 적용되록 함.
 *
 * @category    Board
 *
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 *
 * @link        https://xpressengine.io
 */
class DesignSelectSkin extends DefaultSkin
{
    /**
     * category default 스킨을 이 것으로 변경하기 위해 기본 스킨의 아이디로 등록
     *
     * @var string
     *
     * @see BoardSkin::render()
     */
    protected static $id = 'fieldType/xpressengine@Category/fieldSkin/xpressengine@default';

    /**
     * path delimiter
     *
     * @var string
     */
    protected $delimiter = '.';

    /**
     * get name
     *
     * @return string
     */
    public function name()
    {
        return 'Category Design select skin';
    }

    /**
     * get view path
     *
     * @return string
     */
    public function getPath()
    {
        return 'board::components/DynamicFields/Category/Skins/DesignSelect/views';
    }

    /**
     * get view for create
     *
     * @param  array  $args  arguments
     * @return \Illuminate\View\View
     */
    public function create(array $args)
    {
        if ($this->config->get('category_id') == null && $this->config->get('categoryId') != null) {
            $this->config->set('category_id', $this->config->get('categoryId'));
        }

        $selectItems = [];
        $categoryItems = Category::find($this->config->get('category_id'))->items;
        foreach ($categoryItems as $categoryItem) {
            $selectItems[] = [
                'value' => $categoryItem->id,
                'text' => $categoryItem->word,
            ];
        }

        $this->addMergeData(['selectItems' => $selectItems]);

        return parent::create($args);
    }

    /**
     * get view for edit
     *
     * @param  array  $args  arguments
     * @return \Illuminate\View\View
     */
    public function edit(array $args)
    {
        if ($this->config->get('category_id') == null && $this->config->get('categoryId') != null) {
            $this->config->set('category_id', $this->config->get('categoryId'));
        }

        $selectItems = [];
        $categoryItems = Category::find($this->config->get('category_id'))->items;
        foreach ($categoryItems as $categoryItem) {
            $selectItems[] = [
                'value' => $categoryItem->id,
                'text' => $categoryItem->word,
            ];
        }

        $this->addMergeData(['selectItems' => $selectItems]);

        return parent::edit($args);
    }

    /**
     * get view for show
     *
     * @param  array  $args  arguments
     * @return \Illuminate\View\View
     */
    public function show(array $args)
    {
        $this->path = parent::getPath();

        return parent::show($args);
    }

    /**
     * get view for search
     *
     * @param  array  $args  arguments
     * @return string
     */
    public function search(array $args)
    {
        if ($this->config->get('category_id') == null && $this->config->get('categoryId') != null) {
            $this->config->set('category_id', $this->config->get('categoryId'));
        }

        $selectItems = [];
        $categoryItems = Category::find($this->config->get('category_id'))->items;
        foreach ($categoryItems as $categoryItem) {
            $selectItems[] = [
                'value' => $categoryItem->id,
                'text' => $categoryItem->word,
            ];
        }

        $this->addMergeData(['selectItems' => $selectItems]);

        return parent::search($args);
    }

    /**
     * Dynamic Field 설정 페이지에서 skin 설정 등록 페이지 반환
     * return html tag string
     *
     * @param  ConfigEntity  $config  dynamic field config entity
     * @return string
     */
    public function settings(?ConfigEntity $config = null)
    {
        $viewFactory = $this->handler->getViewFactory();

        return $viewFactory->make(parent::getViewPath('settings', parent::getPath()), [
            'config' => $config,
        ])->render();
    }
}
