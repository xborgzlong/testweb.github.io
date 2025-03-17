<?php 

    // create connection conect to database start.

        $hname = 'localhost';
        $uname = 'root';
        $pass  = '';
        $db    = 'casino_project';

        $con = mysqli_connect($hname, $uname, $pass, $db);
        // check conditional when connection errors.
        if (!$con) 
        {
            die ("Can not connect to database".mysqli_connect_error());
        }
        
    // create connection conect to database end.


    // create function filteration for use start.
        function filteration($data)
        {
            foreach ($data as $key => $value)
            {
                // 'site_title' : 'My_Project'
                    $value = trim($value);
                    $value = stripcslashes($value);
                    $value = strip_tags($value);
                    $value = htmlspecialchars($value);
                        $data [$key] = $value;
            }

            return $data;
        }
    // create function filteration for use end.

    // create function selectall data for use start.
        function selectAll($table)
        {
            $con = $GLOBALS['con'];
            $res = mysqli_query($con, "SELECT * FROM $table");
            return $res;
        }
    // create function selectall data for use end.

    // create function select $sql $values $datatypes start.
        function select($sql, $value, $datatypes)
        {
            $con = $GLOBALS[
                'con'
            ];

            // check conditional start.
                if ($stmt = mysqli_prepare($con, $sql))
                {
                    mysqli_stmt_bind_param($stmt, $datatypes, ...$value);
                        if (mysqli_stmt_execute($stmt))
                        {
                            $res = mysqli_stmt_get_result($stmt);
                            mysqli_stmt_close($stmt);
                            return $res;
                        }
                        else 
                        {
                            mysqli_stmt_close($stmt);
                            die ("Query cannot be executed - Select");
                        }
                }
            // check conditional end.
        }
    // create function select $sql $values $datatypes end.

    // create function update data for use start.
        function update($sql, $values, $datatypes)
        {
            $con = $GLOBALS['con'];
                // check conditional start.
                    if ($stmt = mysqli_prepare($con, $sql))
                    {
                        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
                            if (mysqli_stmt_execute($stmt))
                            {
                                $res = mysqli_stmt_affected_rows($stmt);
                                    mysqli_stmt_close($stmt);
                                    return $res;
                            }
                            else
                            {
                                mysqli_stmt_close($stmt);
                                die ("Query cannot be executed - Update");
                            }
                    }
                    else 
                    {
                        die ("Query cannot be prepare - Update");
                    }
                // check conditional end.
        }
    // create function update data for use end.

    // create function insert data for use start.
        function insert($sql, $values, $datatypes)
        {
            $con = $GLOBALS['con'];
                // check conditional start.
                    if ($stmt = mysqli_prepare($con, $sql))
                    {
                        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
                            if (mysqli_stmt_execute($stmt))
                            {
                                $res = mysqli_stmt_affected_rows($stmt);
                                    mysqli_stmt_close($stmt);
                                    return $res;
                            }
                            else
                            {
                                mysqli_stmt_close($stmt);
                                die ("Query cannot be executed - Insert");
                            }
                    }
                    else
                    {
                        die ("Query cannot be execute - Insert");
                    }
                // check conditional end.
        }
    // create function insert data for use end.

    // create function delete data for use start.
        function delete($sql, $values, $datatypes)
        {
            $con = $GLOBALS['con'];
                // check conditional start.
                    if ($stmt = mysqli_prepare($con, $sql))
                    {
                        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
                            if (mysqli_stmt_execute($stmt))
                            {
                                $res = mysqli_stmt_affected_rows($stmt);
                                mysqli_stmt_close($stmt);
                                return $res;
                            }
                            else 
                            {
                                mysqli_stmt_close($stmt);
                                die ("Query cannot be executed - Delete");
                            }
                    }
                    else 
                    {
                        die ("Query cannot be prepare - Delete");
                    }
                // check conditional end.
        }
    // create function delete data for use end.
?>