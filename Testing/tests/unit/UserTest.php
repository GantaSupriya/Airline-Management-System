<?php 


class SampleTest extends \PHPUnit\Framework\TestCase
{
    public function testSample() //passed in function addflight to test affected rows
    {
       $affected_rows = new \App\Models\addflight;
       
       $affected_rows -> addFlightDetails(1);

       $this -> assertEquals($affected_rows -> get_affected(), 1);
    }

    public function testSample2() //failed in function addflight to test affected rows
    {
       $affected_rows = new \App\Models\addflight;
       
       $affected_rows -> addFlightDetails(1);

       $this -> assertEquals($affected_rows -> get_affected(), -1);
    }

    public function testSample3() //passed in function addflight to test if strings are perfect
    {
       $tempstr = new \App\Models\addflight;
       
       $tempstr -> chk_submit("Successfully Submitted");
       
        $this -> assertEquals($tempstr -> get_chk_submit(), "Successfully Submitted");
    }

    public function testSample4() //failed in function addflight to test if strings are perfect
    {
       $tempstr = new \App\Models\addflight;
       
       $tempstr -> chk_submit("Error Occurred");
       
        $this -> assertEquals($tempstr -> get_chk_submit(), "Successfully Submitted");
    }

    public function testSample5() //passed in function addflight to test if strings are perfect
    {
       $tempstr = new \App\Models\addflight;
       
       $tempstr -> chk_submit("Error Occurred");
       
        $this -> assertEquals($tempstr -> get_chk_submit(), "Error Occurred");
    }

    public function testSample6() //passed in function newuser to test if passed string is empty
    {
        $query = new \App\Models\newuser;

        $query -> add_new_user("");

        $this -> assertEmpty($query -> get_new_user());
    }

    public function testSample7() //passed in function newuser to test if passed string is empty(different in the handler code)
    {
        $query = new \App\Models\newuser;

        $query -> add_new_user("this is not empty");

        $this -> assertEmpty($query -> get_new_user());
    }

    public function testSample8() //passed in function newuser to test if passed string is empty
    {
        $tempstrnew = new \App\Models\newuser;

        $tempstrnew -> chk_error("Submit Error");

        $this -> assertEquals($tempstrnew -> get_chk_error(), "Submit Error");
    }

    public function testSample9() //failed in function newuser to test if passed string is equal but passes as given in driver code
    {
        $tempstrnew = new \App\Models\newuser;

        $tempstrnew -> chk_error("Submit Error");

        $this -> assertEquals($tempstrnew -> get_chk_error(), "Submit Not Error");
    }

    public function testSample10() //error in the test case code.
    {
        $affected_rows = new \App\Models\deactivate_jet;
        $tempstrthis = new \App\Models\deactivate_jet;
        $tempstrthat = new \App\Models\deactivate_jet;

        $affected_rows -> deactivateflight(1);
        $tempstrthis -> deactivateflight("Successfully Deactivated");
        $tempstrthat -> deactivateflight("Submit Error");

        $affected_rows -> checkforTest(1);
        $tempstrthis -> checkforTest("Successfully Deactivated");
        $tempstrthat -> checkforTest("Submit Error");

        $this -> assertEquals($affected_rows -> get_affected(), 1);
    }
}