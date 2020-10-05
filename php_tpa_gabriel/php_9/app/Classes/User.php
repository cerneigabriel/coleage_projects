<?php
class User
{
    protected static $ITEM_NAME = "users";
    protected static $ITEMS = [];

    protected $id;
    protected $first_name;
    protected $last_name;
    protected $birth_date;
    protected $city;
    public $created_at;

    public function __construct()
    {
        $this->id = self::count();
        $this->created_at = date("Y-m-d, h:i:s");
    }

    public static function updateSession()
    {
        $users = Session::getItem(static::$ITEM_NAME);
        $users = ($users === false ? [] : $users);

        Session::setItem(static::$ITEM_NAME, array_merge($users, static::$ITEMS));

        static::$ITEMS = [];
    }

    public static function reset()
    {
        Session::removeItem(static::$ITEM_NAME);
    }

    public static function count()
    {
        $users = Session::getItem(static::$ITEM_NAME);

        return count(($users === false ? [] : $users));
    }

    public static function get()
    {
        $users = Session::getItem(static::$ITEM_NAME);

        return ($users === false ? [] : $users);
    }

    public function id()
    {
        return $this->id;
    }

    public function first_name()
    {
        return $this->first_name;
    }

    public function last_name()
    {
        return $this->last_name;
    }

    public function birth_date()
    {
        return $this->birth_date;
    }

    public function city()
    {
        return $this->city;
    }

    public static function findKEY(int $id)
    {
        foreach (self::get() as $key => $item) {
            if ($item->id() === $id) {
                return $key;
            }
        }

        return false;
    }

    public static function create(array $data)
    {
        $validator = self::validateData($data);

        if (!$validator["valid"]) return $validator;

        $user = new self();

        $user->first_name = $data["first_name"];
        $user->last_name = $data["last_name"];
        $user->birth_date = strtotime($data["birth_date"]);
        $user->birth_date = date("Y-m-d", $user->birth_date);
        $user->city = $data["city"];

        array_push(static::$ITEMS, $user);
        static::updateSession();

        return $user;
    }

    public function destroy()
    {
        $KEY = self::findKEY($this->id);
        Session::removeItem($KEY);
    }

    public static function destroyById(int $id)
    {
        $KEY = self::findKEY($id);
        Session::removeItem(static::$ITEM_NAME, $KEY);
    }

    private function validateData(array $data)
    {
        $errors = [];
        if (!isset($data["first_name"]) || is_null($data["first_name"]) || empty($data["first_name"])) {
            $errors[] = "First Name is missing";
        }

        if (!isset($data["last_name"]) || is_null($data["last_name"]) || empty($data["last_name"])) {
            $errors[] = "Last Name is missing";
        }

        if (!isset($data["birth_date"]) || is_null($data["birth_date"]) || empty($data["birth_date"])) {
            $errors[] = "Brith Date is missing";
        }

        if (!isset($data["city"]) || is_null($data["city"]) || empty($data["city"])) {
            $errors[] = "City is missing";
        }

        return [
            "valid" => count($errors) === 0,
            "errors" => $errors
        ];
    }

    public static function sortBy(string $col, $direction)
    {
        $users = Session::getItem(static::$ITEM_NAME);
        $users = ($users === false ? [] : $users);


        usort($users, function ($a, $b) use ($col, $direction) {
            switch ($direction) {
                case "asc":
                    switch (gettype($a->$col())) {
                        case "integer":
                            return $a->$col() - $b->$col();
                            break;

                        case "string":
                            return strcmp($a->$col(), $b->$col());
                            break;
                    }
                    break;

                case "desc":
                    switch (gettype($a->$col())) {
                        case "integer":
                            return $b->$col() - $a->$col();
                            break;

                        case "string":
                            return strcmp($a->$col(), $b->$col()) * -1;
                            break;
                    }
                    break;
            }
        });

        return $users;
    }
}
