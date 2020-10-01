<?php 
class Cms5f76531acef7d587510811_feeac8dca68ba0ec51e55bde669d82a3Class extends Cms\Classes\PageCode
{
public function onEnd()
{
    if ($this->post) {
        $this->page->title = $this->post->title;
    }
    else {
        return Redirect::to($this->pageUrl('404'));
    }
}
}
