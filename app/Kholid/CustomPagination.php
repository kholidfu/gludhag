<?php namespace Kholid;

use Illuminate\Pagination\BootstrapThreePresenter;


class CustomPagination extends BootstrapThreePresenter {


    public function render()
    {
        if ($this->hasPages())
        {
            return sprintf(
                '<ul class="pagination clearfix">%s %s %s</ul>',
                $this->getPreviousButton(),
                $this->getLinks(),
                $this->getNextButton()
            );
        }

        return '';
    }


    protected function getDisabledTextWrapper($text)
    {
        return '<li class="disabled"><a href="#">'.$text.'</a></li>';
        // return '<li class="disabled"><span>'.$text.'</span></li>';
    }


    protected function getActivePageWrapper($text)
    {
        return '<li class="active"><a href="#">'.$text.'</a></li>';
        // return '<li class="active"><span>'.$text.'</span></li>';
    }


    public function hasPages()
    {
        return $this->paginator->hasPages();
    }


}