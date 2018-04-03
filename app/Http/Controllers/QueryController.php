<?php

namespace App\Http\Controllers;

use App\Address;
use App\Department;
use App\Employee;
use App\Full_time_part_time;
use App\Project;
use App\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Http\Controllers\Controller;

use Illuminate\Database\Eloquent\Collection;
use function Sodium\add;


class QueryController extends Controller
{

    public function query1()
    {
        $names = DB::select("SELECT
                                        employees.name,projects.project_name,projects.project_location,departments.dept_name
                                    FROM
                                        employees,
                                        projects,
                                        departments,
                                        full_time_part_times
                                    WHERE
                                        full_time_part_times.emp_id = employees.id
                                        AND full_time_part_times.dept_id = departments.dept_id
                                        AND departments.dept_name = 'Engineering' 
                                        AND full_time_part_times.project_id = projects.project_id 
                                        AND projects.project_name = 'Googong Subdivision' 
                                        AND projects.project_location = 'Googong' 
                                        GROUP BY employees.id
                                        ");

        return view('query_one')->with('datas', $names);
    }

    public function query2()
    {
        $query = DB::select("SELECT
                employees.name,
                (
                    SUM(
                        full_time_part_times.num_of_hours
                    ) / COUNT(
                        full_time_part_times.works_date
                    )
                ) * 5 AS PerWeek
            FROM
                employees,
                projects,
                full_time_part_times,
                departments
            WHERE
                full_time_part_times.emp_id = employees.id AND full_time_part_times.dept_id = departments.dept_id AND departments.dept_name = 'Labor' AND projects.project_id = full_time_part_times.project_id AND projects.project_name = 'Googong Subdivision' AND projects.project_location = 'Googong'
               
            GROUP BY
                employees.id
                HAVING  (  SUM(full_time_part_times.num_of_hours ) / COUNT(full_time_part_times.works_date ) ) * 5>20
            
            ORDER BY
                employees.id");
        //dd($query);
        return view('query_two')->with('datas',$query);
    }

    public function query3()
    {
        $query = DB::select("SELECT
                    employees.name,
                    addresses.street_no,
                    addresses.street_name,
                    addresses.city,
                    addresses.zip_code,
                    departments.dept_location,
                    projects.project_location
                FROM
                    employees,
                    departments,
                    addresses,
                    projects,
                    full_time_part_times
                WHERE
                    full_time_part_times.emp_id = employees.id 
                    AND full_time_part_times.dept_id = departments.dept_id 
                    AND projects.project_id = full_time_part_times.project_id 
                    AND projects.project_location = 'Burton Canberra' 
                    AND departments.dept_location != 'Canberra'
                    AND full_time_part_times.emp_id=addresses.emp_id
                GROUP BY
                    employees.id
                HAVING
                    COUNT(projects.project_id) > 0
                ORDER BY
                    employees.id");
       // dd($query);
        return view('query_three')->with('datas',$query);
    }

    public function query4()
    {
        $query = DB::select("SELECT
                  DISTINCT employees.name
                FROM
                    employees,
                    projects,
                    full_time_part_times
                WHERE
                    full_time_part_times.project_id = projects.project_id
                    AND projects.project_name = 'Burton Highway'
                    AND full_time_part_times.emp_id = employees.id
                    AND employees.name
                      IN (
                        SELECT DISTINCT employees.name
                        FROM
                          employees,
                          projects,
                          full_time_part_times
                        WHERE
                          full_time_part_times.project_id = projects.project_id
                           AND projects.project_name = 'Googong Subdivision' 
                           AND full_time_part_times.emp_id = employees.id)");
        return view('query_four')->with('datas',$query);
    }

    public function query5()
    {
        $query=DB::select("SELECT
                            employees.name,
                            departments.dept_name,
                            employees.type_of_work,
                            salaries.basic,
                            (.45 * salaries.basic) AS ALLOWENCE,
                            (
                                .09 * salaries.basic +.15 * salaries.basic
                            ) AS Deduction,
                            salaries.net_salary
                        FROM
                            employees,
                            departments,
                            salaries
                        WHERE
                            employees.id = salaries.emp_id AND employees.dept_id = departments.dept_id
                        ORDER BY
                            employees.id");
     //   dd($query);
        return view('query_five')->with('datas',$query);
    }

    public function input()
    {
        for ($i = 1; $i <= 100; $i++) {
            /* $emp=new Employee();
             $emp->id=$i;
             $emp->name='employee'.$i;
             $emp->dept_id=rand(1,3);
             $work_type=rand(0,1);
             if($work_type){
                 $emp->type_of_work='F';
             }
             else{
                 $emp->type_of_work='P';
                 $emp->hourlyrate=rand(25,60);
             }
             $emp->email='employee'.$i.'@gmail.com';
             $emp->password=bcrypt('123456');
             $emp->save();
 */

            /*  $address=new Address();
              $address->emp_id=$i;
              $street_no=rand(30,200);
              $address->street_no=$street_no;
              $address->street_name='street'.$street_no;
              $address->city='randomcity'.$street_no;
              $address->zip_code=rand(5000,9999);
              $address->save();
            */

            /*
                                      $ftpt = new Full_time_part_time();
                                       $ftpt->project_id = rand(1, 5);
                                       $emp_id = rand(1, 100);
                                       $ftpt->emp_id = $emp_id;
                                       $emp = Employee::find((int)$emp_id);
                                       //dd($emp);
                                       $ftpt->dept_id = $emp->dept_id;
                                       if ($emp->type_of_work == 'F') {
                                           $ftpt->num_of_hours = 8;
                                       } else {
                                           $ftpt->num_of_hours = rand(1, 7);
                                       }
                                       $ftpt->works_date = date("Y-m-d H:i:s", mt_rand(1262055681, 1273055681));
                                       $ftpt->save();

            */
            /*
                        $p_name=['Googong Subdivision','Burton Highway','Workshop Repair','Canberra Street','Kotara Highway'];
                          $p_location=['Googong','Burton Canberra','Kotara','Canberra','Kotara'];
                           $proj=new Project();
                           $proj->project_id=$i;

                           $proj->project_name=$p_name[$i-1];
                           $proj->project_location=$p_location[$i-1];
                           $proj->save();
            */
            /*
                        $sal = new Salary();
                        $sal->emp_id=$i;
                        $emp = Employee::find($i);
                        if ($emp->type_of_work == 'F') {
                            $bas = rand(5000, 10000);
                            $sal->basic = $bas;
                            $sal->net_salary = $bas + 0.45 * $bas - (.09 * $bas + .15 * $bas);
                            $sal->salary_date = date("Y-m-d H:i:s", mt_rand(1262055681, 1263055681));
                        } else {
                            $query = DB::selectOne(" SELECT
                SUM(full_time_part_times.num_of_hours) AS hrs
            FROM
                (
                SELECT
                   full_time_part_times.num_of_hours
                FROM
                   `full_time_part_times`
                   WHERE full_time_part_times.emp_id='$i'
                ORDER BY
                  full_time_part_times.works_date
                DESC
            LIMIT 30
            ) full_time_part_times");

                            //dd($query->hrs);

                           $bas = $emp->hourlyrate *(int)$query->hrs;
                            $sal->basic = $bas;
                            $sal->net_salary = $bas + 0.45 * $bas - (.09 * $bas + .15 * $bas);
                            $sal->salary_date = date("Y-m-d H:i:s", mt_rand(1262055681, 1263055681));
                        }
                        $sal->save();
            */


        }

    }
}
