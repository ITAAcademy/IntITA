<?php

class LibraryHelper {
    
    public $temporaryBookPosition = 9999;

	public function changeBookPosition($book, $position)
    {
        $bookByPosition = Library::model()->find('position=:position', array(':position'=>$position));
        if (!empty($bookByPosition->id) && $book->id !== $bookByPosition->id) {
            if ($book->position === null) {
                $lastBook = Library::model()->find(['order'=>'id DESC']);
                $this->temporaryBookPosition = $lastBook->id + 1;
                $this->storeBookByPosition($bookByPosition);
            } else {
                if ($this->storeBookByPosition($bookByPosition)) {
                    $this->temporaryBookPosition = $book->position;
                }
            }
            return $bookByPosition;
        }
        return 'noChanging';
    }

    public function storeBookByPosition($book)
    {
        if ($book === 'noChanging') {
            return true;
        } else {
            $book->position = $this->temporaryBookPosition;
            return $book->save();
        }
    }
}