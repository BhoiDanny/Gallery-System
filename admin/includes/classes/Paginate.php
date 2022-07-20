<?php

class Paginate
{
    public $currentPage;
    public $itemsPerPage;
    public $itemTotal;

    public function __construct(
        $page = 1,
        $itemsPerPage = 4,
        $itemTotal = 0
    ){
        $this->currentPage  = (int)$page;
        $this->itemsPerPage = (int)$itemsPerPage;
        $this->itemTotal    = (int)$itemTotal;
    }

    public function next() {
        return $this->currentPage + 1;
    }

    public function previous() {
        return $this->currentPage - 1;
    }

    public function pageTotal() {
        $totalPages = $this->itemTotal / $this->itemsPerPage;
        return ceil($totalPages);
    }

    public function hasNext() {
        if ($this->next() <= $this->pageTotal()) {
            return true;
        } else {
            return false;
        }
    }

    public function hasPrevious(){
        if($this->previous() >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function offSet() {
        return ($this->currentPage - 1) * $this->itemsPerPage;
    }

}