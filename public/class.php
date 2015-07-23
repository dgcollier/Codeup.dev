<?php 

class Person
{
    public $firstName;
    public $lastName;
}

class Cohort
{
    public $name;
    public $startDate;
    public $endDate;
    public $students = array();

    public function addStudent($student)
    {
        $this->students[] = $student;

        return 'Weclome to ' . $this->name . ' ' . $student->firstName . ' ' . $student->lastName . PHP_EOL;
    }
}

$person1 = new Person();

$person1->firstName = 'David';
$person1->lastName = 'Collier';

$person2 = new Person();

$person2->firstName = 'Ben';
$person2->lastName = 'Batschelet';

$person3 = new Person();

$person3->firstName = 'Remmington';
$person3->lastName = 'Williams';

echo $person1->firstName . ' ' . $person1->lastName . PHP_EOL;

$glacier = new Cohort ();

$glacier->name = 'Glacier';
$glacier->addStudent($person1);
$glacier->addStudent($person2);
$glacier->addStudent($person3);

print_r($glacier);