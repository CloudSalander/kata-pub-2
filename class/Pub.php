
<?php

class Pub {

    private array $tables;
    private array $reservations;
    
    public function __construct($tables) {
        $this->tables = $tables;
        $this->reservations = [];
    }

    public function checkReservation(string $name, int $qty): bool {
        $tableId = $this->checkTables($qty);
        if($tableId > 0) {
            $this->reservations[] = ["id" => $tableId, "name" => $name];
            return true;
        }
        return false;
    } 

    private function checkTables(int $qty): int {
        foreach($this->tables as $table) {
            //Why I check first if its busy?
            if(!$table->getIsBusy() && $table->getCapacity() >= $qty) {
                $table->switchIsBusy();
                return $table->getId();
            }
        }
        return -1;
    }
}