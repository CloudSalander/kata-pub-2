
<?php

class Pub {

    private array $tables;
    private array $reservations;

    const GET_IN = "Welcome! your table is number ";
    const GET_OUT = "Please, leave quietly".PHP_EOL;
    
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
    
    public function getIn(string $reservationName): void {
        var_dump($reservationName);
        $hasReservation = $this->hasReservation($reservationName);
        var_dump($hasReservation);
        if ($hasReservation) {
            echo self::GET_IN.$this->$tables[$hasReservation]->getId();
        }
        else {
            echo self::GET_OUT;
        }
    }

    private function checkTables(int $qty): int {
        foreach($this->tables as $table) {
            if(!$table->getIsBusy() && $table->getCapacity() >= $qty) {
                $table->switchIsBusy();
                return $table->getId();
            }
        }
        return -1;
    }

    private function hasReservation(string $reservationName): int | bool {
        var_dump($reservationName);
        $names = array_column($this->reservations, "name");

        $pos = array_search($reservationName, $names);

        return $pos;
    }
}