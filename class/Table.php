<?php 
//Maybe we can solve that with a assoc array?
class Table {

    private int $id;
    private int $capacity;
    private bool $isBusy;

    public function __construct($id,$capacity) {
        $this->id = $id;
        $this->capacity = $capacity;
        $this->isBusy = false;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getCapacity(): int {
        return $this->capacity;
    }

    public function getIsBusy(): bool {
        return $this->isBusy;
    }

    public function switchIsBusy(): void {
        $this->isBusy = !$this->isBusy;
    }
}

