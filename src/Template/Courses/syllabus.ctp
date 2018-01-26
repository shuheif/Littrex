<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">
          Syllabus - 
          <?php
                $title = h($course->department) . $this->Number->format($course->number) . " " . ($course->title);
                echo $title;
          ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(h($course->department . $course->number . ' ' . $course->title), ['action' => 'view', $course->id], ['class' => 'action-bar-before']) ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<section class="content">
  <center><br><br><table width="95%">
<tbody><tr>
<td width="75%" valign="top"><center><font face="arial" size="-1"><b>DRAFT 19<br>MECHANICAL DRAWING</b></font><br>
<br>
<font face="arial" size="+2"><b>COURSE SYLLABUS</b></font><br>
<br>
<font face="arial" size="-1">FALL, 1998<br>
<br>
INSTRUCTOR:  JOHN DOE</font></center><br>
<center><hr width="95%"></center></td>

<td width="2%"><br></td>

<td width="23%" bgcolor="#F8F7D9" valign="top"><font face="arial" size="-2">Course alpha, 
number, and title.  Document title.  Since you'll keep reference copies of syllabi 
for a number of semesters, the date is useful in distinguishing this syllabus from 
others that naturally look much the same.  Instructor name sets syllabus apart from 
others for sections of the course possibly taught by other people, and of course it's 
important for students.</font></td>
</tr><tr>

<td>
<table>
<tbody><tr>
<td width="30%"><font face="arial" size="-1">OFFICE:</font></td>
<td width="70%"><font face="arial" size="-1">Building 2, Room 613</font></td>
</tr><tr>
<td valign="top"><font face="arial" size="-1">OFFICE HOURS:</font></td>
<td><font face="arial" size="-1">4:30-5:30 MON &amp; WED; 7:30-8:30 TUE &amp; THR; 11:30-12:30 FRI</font></td>
</tr><tr>
<td valign="top"><font face="arial" size="-1">OFFICE PHONE:</font></td>
<td><font face="arial" size="-1">845-9409 (leave a message after six rings; please speak loud enough and clearly)</font></td>
</tr><tr>
<td valign="top"><font face="arial" size="-1">E-MAIL ADDRESS:</font></td>
<td><font face="arial" size="-1">johndoe@hcc.hawaii.edu (school)<br>johndoe@aol.com (weekends and holidays)</font></td>
</tr><tr>
<td><font face="arial" size="-1">WEB PAGE:</font></td>
<td><font face="arial" size="-1">http://home.honolulu.hawaii.edu/~johndoe</font></td>
</tr><tr>
<td><font face="arial" size="-1">COURSE PAGE:</font></td>
<td><font face="arial" size="-1">http://www.honolulu.hawaii.edu/instruct/div6/drafting/basic.htm</font></td>
</tr><tr>
<td><font face="arial" size="-1">CLASS HOURS:</font></td>
<td><font face="arial" size="-1">5:30-7:50 MON &amp; WED</font></td>
</tr><tr>
<td colspan="2"><hr></td>
</tr>
</tbody></table></td>

<td><br></td>

<td bgcolor="#F8F7D9" valign="top"><font face="arial" size="-2">The basics so 
students can communicate with you as easily as possible.  Students appreciate (and need) 
easy access.  They should not feel unduly restricted.  John has found that students who 
phone are often hesitant and speak too softly to be heard, or they run together the 
last numbers of their phone numbers.  So he makes a point of encouraging clarity on  
the phone.</font></td>
</tr><tr>

<td><font face="arial" size="-1">
  <dl>
  <dt><b>A. DESCRIPTION</b>
  </dt><dd>This course involves a careful examination of drafting as a tool of technical 
  communication and for solving graphical problems.  Emphases are on development 
  of basic drafting skills, visualization, and solution of spatial problems.  It 
  is an exploratory, first course in drafting designed primarily for students 
  planning to enroll in the regular-program Drafting Technology courses upon 
  completion of this course.  However, it also meets the needs of many students 
  with other interests, as a refresher course in drafting, a course for upgrading 
  drafting skills, a course for IED students training to be public school 
  industrial arts teachers, or a course that provides students with a general 
  "feel" for the subject of drafting.
  </dd></dl></font></td>

<td><br></td>

<td bgcolor="#F8F7D9" valign="top"><font face="arial" size="-2"><br>The course -- what it is 
and how it fits into a program or supports other courses, needs, etc.  Throughout this 
syllabus there are things students will not read the first day, but they probably will 
read it later, or they will use it later for reference.</font></td>
</tr><tr>

<td><font face="arial" size="-1">
  <dl>
  <dt><b>B. ORGANIZATION</b>
  </dt><dd>This is a lecture-lab course in which topics are presented by the instructor, 
  practice drawings are explained, and assigned drawings are completed by students 
  both during lab periods and outside of class.  Objective and drawing-type quizzes 
  are given daily, and there is a comprehensive final exam.  The course is a 
  prerequisite for the beginning regular-program drafting courses.  DRAFT 19 
  students generally have had neither high school or other drafting training, nor 
  experience in drafting employment.  So when students in this course proceed to 
  the regular-program drafting courses, if they do, they will be at approximately 
  the same level of expertise as those who have had previous training or experience 
  and who are permitted to waive DRAFT 19.  This basic drafting course therefore 
  assumes no previous drafting experience or training, so the initial emphases are 
  on the use of equipment and basic procedures.
  </dd></dl></font></td>
  
<td><br></td>

<td bgcolor="#F8F7D9" valign="top"><font face="arial" size="-2"><br>This could 
probably be worked into "purpose."  But here John states very briefly "how" the 
course will be conducted and very roughly what will be involved.</font></td>
</tr><tr>

<td><font face="arial" size="-1">
  <dl>
  <dt><b>C. COURSE OBJECTIVES</b>
  </dt><dd> <ol>
    <li>To introduce students to the use of mechanical drafting tools, to 
    drafting procedures, and to acceptable standards of work in the industry.
    </li><li>To introduce students to various forms of graphical representation 
    and to selection of representations appropriate to specific needs.
    </li><li>To introduce students to time and quality drafting production 
    requirements.
    </li><li>To orient students to the range of drafting methods, topics, and 
    occupations that characterize the field.
    </li><li>To provide students with opportunities to develop basic drafting 
    skills in respect to sheet composition, working neatly and accurately, 
    lettering, and line drawing.
    </li></ol>
  </dd></dl></font></td>

<td><br></td>

<td bgcolor="#F8F7D9" valign="top"><font face="arial" size="-2"><br>Five or six general, 
overall objectives of the course.  These might be stated in the form of behavioral 
or performance objectives, but John has reserved that format for class and activity 
objectives that are more specific, differentiated, and quantifiable.</font></td>
</tr><tr>

<td><font face="arial" size="-1">
  <dl>
  <dt><b>D. COURSE TOPICS</b>
  </dt><dd>The course will cover the following topics:
    <ol>
    <li>Equipment and Basic Drafting Procedures
    </li><li>Lettering; Symbols
    </li><li>Drafting Geometry and Single-View Drawing
    </li><li>Orthographic Projection
    </li><li>Dimensions
    </li><li>Auxiliary Views
    </li><li>Sectional Views
    </li><li>Pictorial Drawing (isometric and perspective drawing)
    </li><li>Threads
    </li><li>Weldments
    </li><li>Developments
    </li><li>Introduction to Descriptive Geometry
    </li><li>Introduction to Computer Drafting
    </li><li>Architectural Working Drawings (plans, sections, and elevations)
    </li></ol>
  </dd></dl></font></td>

<td><br></td>

<td bgcolor="#F8F7D9" valign="top"><font face="arial" size="-2"><br>The units or topics of 
study.  It shows the progression of topics and evidences your pre-course planning.</font>
<br></td>
</tr><tr>

<td><font face="arial" size="-1">
  <dl>
  <dt><b>E. TEXT AND REQUIRED SUPPLIES</b> 
  </dt><dd> <ol>
    <li>Required text: <em>Basic Technical Drawing,</em> by Spencer &amp; Dygdon 
    </li><li>Supplies:  see separate list with pictures.
    </li></ol>
  </dd></dl></font></td>

<td><br></td>

<td bgcolor="#F8F7D9" valign="top"><font face="arial" size="-2"><br>Very important.  Students 
need to know right away what materials they need and how much the course will cost them.
</font><br></td>
</tr><tr>

<td><font face="arial" size="-1">
  <dl>
  <dt><b>F. GRADING PLAN</b>
  </dt><dd>Coursework will be weighted as follows:
  </dd><dd>
  <table width="90%">
  <tbody><tr>
  <td width="8%"><br></td>
  <td width="44%"><font face="arial" size="-1">1. Drawings</font></td>
  <td width="10%" align="center"><font face="arial" size="-1">45%</font></td>
  <td width="2%"><br></td>
  <td width="10%"><br></td>
  <td width="2%"><br></td>
  <td width="10%"><br></td>
  <td width="2%"><br></td>
  <td width="10%"><br></td>
  </tr><tr>
  <td><br></td>
  <td><font face="arial" size="-1">2. Quizzes</font></td>
  <td colspan="2"><br></td>
  <td align="center"><font face="arial" size="-1">25%</font></td>
  <td colspan="4"><br></td>
  </tr><tr>
  <td><br></td>
  <td><font face="arial" size="-1">3. Final exam</font></td>
  <td colspan="2"><br></td>
  <td align="center"><font face="arial" size="-1">20%</font></td>
  <td colspan="4">
  </td></tr><tr>
  <td><br></td>
  <td><font face="arial" size="-1">4. Attendance</font></td>
  <td align="center"><font face="arial" size="-1">____</font></td>
  <td><br></td>
  <td align="center"><font face="arial" size="-1">____</font></td>
  <td><br></td>
  <td align="center"><font face="arial" size="-1"><u> 10% </u></font></td>
  <td colspan="2"><br></td>
  </tr><tr>
  <td colspan="2"><br></td>
  <td align="center"><font face="arial" size="-1">45%</font></td>
  <td align="center"><font face="arial" size="-1">+</font></td>
  <td align="center"><font face="arial" size="-1">45%</font></td>
  <td align="center"><font face="arial" size="-1">+</font></td>
  <td align="center"><font face="arial" size="-1">10%</font></td>
  <td align="center"><font face="arial" size="-1">=</font></td>
  <td align="center"><font face="arial" size="-1">100%</font></td>
  </tr></tbody></table>
  </dd></dl></font></td>

<td><br></td>

<td bgcolor="#F8F7D9" valign="top"><font face="arial" size="-2"><br>Very important 
and often explicitly required.  Students MUST know how they are going to be graded, 
and they must know this as early as possible.  This is the place to "put it in 
writing" and ensure that everyone is clear about it (students who enroll late should 
be given a syllabus upon entering the class).</font></td>
</tr><tr>

<td><font face="arial" size="-1">
  <dl>
  <dd><u>DRAWINGS</u>:<br>
  A drawing will be assigned almost every class period.  Each drawing will be 
  graded unless there are major errors or omissions and it is returned for 
  correction or completion.  Drawings with minor detail or other non-conceptual 
  errors will be graded as submitted, and letter grades will be given.  
  <p>
  Drawing due dates will be given to you for each assignment.  Drawings will <em>
  usually</em> be due at the <em>beginning</em> of class periods on the due dates 
  (unless specifically stated otherwise).  Unless you are absent on the day an 
  assignment is due, it will not be accepted later than at the beginning of the 
  class period when it is due.  If you are absent from class when a drawing is 
  due, it will be accepted late -- but only if submitted <em>immediately</em> upon 
  your return and only if an acceptable, written "excuse," is presented.  If you 
  cannot attend class when a drawing is due and cannot provide an acceptable 
  written excuse, you should send your drawing to class with a friend, family 
  member, or other person.  An "acceptable" excuse for an absence is only one 
  which is judged so by the instructor.  Due dates will not be changed because of 
  earlier absences.
  </p></dd></dl></font></td>

<td><br></td>

<td bgcolor="#F8F7D9" valign="top"><font face="arial" size="-2"><br>It's best to be as precise 
as possible "up front" rather than clarifying policies as questions and problems arise 
later.  Policies should be presented in an open, friendly manner.  Students generally 
appreciate clarity and same-for-all policies if they are reasonable, explainable, and 
open for discussion.  These particular policies were developed as a result of some 
students regularly "choosing" to submit every assignment late if permitted, the 
difficulty of keepng track of lower-grade late assignments, students being preoccupied 
with late work when most of the class was moving on to new work, etc.</font></td>
</tr><tr>

<td><font face="arial" size="-1">
  <dl>
  <dd><u>QUIZZES</u>:<br>
  There will be many drawing-type and other quizzes (probably one almost every 
  class period).  Quizzes will relate to current <em>and previous</em> topics.  A 
  quiz may be given at <em>any</em> time during any class period -- immediately 
  after a lecture, at the beginning or end of a class, etc.  There will be no 
  make-up quizzes -- none even later during the same class period.  Quizzes will 
  be given only to those students who are present when the quizzes are passed out.
  </dd></dl></font></td>

<td><br></td>

<td bgcolor="#F8F7D9" valign="top"><font face="arial" size="-2"><br>Daily quizzes encourage 
regular attendance, emhasize the importance of each class, and are great <u>teaching</u> 
tools.  At the second class, students are quizzed principally on this syllabus.</font></td>
</tr><tr>

<td><font face="arial" size="-1">
  <dl>
  <dd><u>FINAL EXAM</u>:<br>
  The final exam will be comprehensive and entirely drawing-type.  It will be 
  given at the time shown at the end of the schedule that follows.
  </dd></dl></font></td>

<td><br></td>

<td bgcolor="#F8F7D9"><br></td>
</tr><tr>

<td width="75%"><font face="arial" size="-1">
  <dl>
  <dd><u>ATTENDANCE</u>:<br>
  Attendance will be graded as follows:
    <dl>
    <dd><table width="40%">
    <tbody><tr>
    <td width="80%"><font face="arial" size="-1">No absences</font></td>
    <td width="20%"><font face="arial" size="-1">A+</font></td>
    </tr><tr>
    <td><font face="arial" size="-1">One absence</font></td>
    <td><font face="arial" size="-1">A</font></td>
    </tr><tr>
    <td><font face="arial" size="-1">Two absences</font></td>
    <td><font face="arial" size="-1">B</font></td>
    </tr><tr>
    <td><font face="arial" size="-1">Three absences</font></td>
    <td><font face="arial" size="-1">C</font></td>
    </tr><tr>
    <td><font face="arial" size="-1">Four or more absences</font></td>
    <td><font face="arial" size="-1">F</font></td>
    </tr></tbody></table>
    </dd></dl>
    <p>
  Absences for which a medical or court excuse is provided (professional letterhead 
  required) will be recorded but not figured in the attendance grade.  Likewise, 
  <em>one</em> absence for which <em>advance</em> notice is given by phone or in 
  person will not be figured in the attendance grade.  <em>Any significant tardy or 
  early departure from class will be figured as a half absence.</em> 
  </p><p>
  <em>Also, <b>anyone who has more than four class-long, unexcused absences will 
  receive an "F" grade for the COURSE.</b></em>  Keep in mind that this is an 
  occupational course, and attendance is important here just as it will be in the 
  employment for which this course is in part designed to prepare you.
  </p></dd></dl></font></td>

<td width="2%"><br></td>

<td width="23%" bgcolor="#F8F7D9" valign="top"><font face="arial" size="-2"><br>If required, 
required attendance needs to be explainable, incorporated into course or activity 
objectives, and clarified the very first day of class.  Six to 10 absences are often 
considered "reasonable" in employment over a year, and a semester course meets about 
one-quarter of a year, usually fewer than five days a week, and only a few hours each 
time, so six absences plus "excusable" absences and one "freebie" is probable reasonable 
in an occupational course.</font><br></td>
</tr><tr>
 
<td><font face="arial" size="-1">
  <dl>
  <dd><u>GENERAL</u>:<br>
  Your recorded grades will be available for your review at any convenient time.  
  Do remember to <em>keep all drawings and quizzes returned to you</em> so that 
  any discrepancies can be easily and fairly straightened out.  Except in cases of 
  actual error, final grades are permanent.  The last day to withdraw from the 
  course is Friday, October 16.
  <p>
  Final "I" grades will <em>not</em> be permitted except in cases of prolonged, 
  continuous, and excused absences in the latter half of the course.  Under no 
  circumstances will an "I" grade be given when more than half of the coursework 
  has not been completed.
  </p><p>
  Final "N" grades will be given only in very rare and exceptional cases.  An "N" 
  will <em>never</em> be given simply to replace a grade that you would prefer not 
  to receive.
  </p><p>
  You will be required to meet privately with the instructor in his office at least 
  one time outside of class time early in the course and to complete at least two 
  evaluation-type exercises during the course.
  </p></dd></dl></font></td>

<td><br></td>

<td bgcolor="#F8F7D9" valign="top"><font face="arial" size="-2"><br>General grading policies 
really need to be spelled out as early as possible.  The policies here are based on 
having tried probably everything else, finding that students very seldom make up 
"incompletes," and understanding that there are liability issues involved in recording 
a failing grade for any student when an "N" (no grade) is recorded for anyone else.  
Since settling on these policies years ago, John has never had a student complaint about 
a grade or ever struggled over a grade.</font><br></td>
</tr><tr>

<td><font face="arial" size="-1">   
  <dl>
  <dt><b>G. CLASSROOM RULES OF CONDUCT</b>
  </dt><dd> <ol>
    <li>No radios are allowed in class unless operated only with headphones 
    and only during drawing periods.
    </li><li>No drawing is permitted during lecture periods.
    </li><li>Food and beverages are not permitted in the classroom.  This includes 
    plate lunches, drinks, candy, etc. whether opened or not.
    </li><li>Class lab time is expected to be spent in lab work.  Lab time is not 
    free time.  Attendance and concerted work on assignments are required.  
    Work at home will be required <em>in addition to</em> work during lab times 
    (work at home should not <em>substitute for</em> work during lab periods).
    </li></ol>
  </dd></dl></font></td>

<td><br></td>

<td bgcolor="#F8F7D9" valign="top"><font face="arial" size="-2"><br>Miscellaneous operating rules 
appropriate to the type of course and the classroom/lab environment.  For trade courses, 
<b>safety rules</b> should be spelled out here or separately.
</font></td>
</tr><tr>

<td><font face="arial" size="-1">
  <dl>
  <dt><b>H. EMERGENCY PROCEDURES</b>
  </dt><dd> <ol>
    <li><u>Evacuation procedures</u> -- see instructions posted in the classroom.
    </li><li><u>First aid kit</u> -- located in Room 612.  All instructors have a key 
    to the room.
    </li><li><u>Emergency ambulance</u> -- from any instructor's office, phone "9" to 
    get an outside line, then "911."  There are also phones on other floors 
    and at the bookstore and nurse's office on the ground floor.
    </li><li><u>Campus security</u> -- phone "142" Mon, Tues, or Fri 7:00 am - 4:30 pm, 
    Wed or Thrs 7:00am - 6:30pm; phone "245" Mon through Wed 5:00 pm - 
    10:00 pm, Thrs 5:00 pm - 8:00 pm.
    </li></ol>  
  </dd></dl></font></td>

<td><br></td>

<td bgcolor="#F8F7D9" valign="top"><font face="arial" size="-2"><br>Should be more specific.
</font></td>
</tr><tr>

<td><font face="arial" size="-1">
  <dl>
  <dt><b>I. YOUR IDEAS, EVALUATIONS, ETC.</b>
  </dt><dd>In general, your ideas, comments, suggestions, questions, grade challenges, 
  etc. are welcome.  Your discretion in these matters is expected, however.  No 
  part of your grade will be based on anything other than your coursework and 
  attendance.
  <p>
  You are encouraged to take advantage of instructor office hours for help with 
  coursework or anything else connected with the course and your progress.
  </p></dd></dl></font></td>

<td><br></td>

<td bgcolor="#F8F7D9" valign="top"><font face="arial" size="-2"><br>The idea is 
to have a plan and policies in place, i.e., be organized, and at the same time be 
encouraging of questions, ideas, and opinions, whatever they are.</font><br></td>
</tr><tr>  

<td><font face="arial" size="-1">
  <dl>
  <dt><b>J. SUGGESTIONS FOR SUCCESS</b>
  </dt><dd>For most students this will not be a "difficult" course. However, there will 
  probably be some students who did well in academic courses where information 
  was most important and who will be surprised at the relative difficulty of 
  this course where manual skills and visualization are most important.  So do 
  not think that if you are a "B" student you will probably get a "B" in this 
  course.  You might get an "A" with relative ease . . . or a "C" with difficulty, 
  and still be (and correctly so) a "B student" in your information-heavy, 
  mainly lecture-type courses.  The courses that follow this will be significantly 
  different.  For specific suggestions, check out <a href="http://www.honolulu.hawaii.edu/instruct/div5/drafting/suggest.htm">
  <b>suggestions for success</b></a> at our Internet site.
  </dd></dl>
  </font></td>

<td><br></td>

<td bgcolor="#F8F7D9" valign="top"><font face="arial" size="-2"><br>Address expectations.  
An optional or alternative topic here might be "How to Take This Course," or information 
about its design for different learning styles.  Many students will not read this "extra" 
material, but others on the first day are hepped up and will read every word.
</font></td>
</tr>
</tbody></table></center>
<br>
<br>

<center><table width="95%" cellpadding="5">
<tbody><tr>

<td align="center" bgcolor="#D6D6D6"><font face="arial"><b>TENTATIVE SCHEDULE</b></font></td>

</tr><tr>
<td><br><font size="-1">A daily or weekly schedule is not a required part of or 
required addendum to a syllabus.  It does, however, help keep the course on track 
throughout a semester, help the instructor from "running out of time" at the end of a 
course, enable students to always see what is coming up or what they will miss if absent, 
and evidences good planning and organization.  It also saves the instructor significant 
planning time <u>during</u> the course.  The schedule should not be so tight, though, 
that it is difficult to keep up with it or that it makes the course rigid.  Until a 
course has been taught a couple of times, a weekly schedule is probably preferrable to a 
daily schedule.  It should be entitled "Tentative" Schedule so you are not legally at 
risk if you diverge from it even slightly.</font></td>
</tr>
</tbody></table></center>
<p>

</p><center><table width="95%" cellpadding="3" border="">
<tbody><tr>
<td width="10%" bgcolor="#F8F7D9" align="center"><b><font face="arial" size="-1">DATE</font></b></td>
<td width="8%" bgcolor="#F8F7D9" align="center"><b><font face="arial" size="-1">DAY</font></b></td>
<td width="8%" bgcolor="#F8F7D9" align="center"><b><font face="arial" size="-1">DRWG</font></b></td>
<td width="74%" bgcolor="#F8F7D9" align="center"><b><font face="arial" size="-1">TOPIC/ACTIVITY</font></b></td>
</tr><tr>
<td align="right"><font face="arial" size="-1">AUG 24</font></td>
<td align="center"><font face="arial" size="-1">MON</font></td>
<td><br></td>
<td><font face="arial" size="-1">Introduction to the course</font></td>
</tr><tr>
<td align="right" valign="top"><font face="arial" size="-1">26</font></td>
<td align="center" valign="top"><font face="arial" size="-1">WED</font></td>
<td align="center" valign="top"><font face="arial" size="-1"><br>1</font></td>
<td><font face="arial" size="-1"><b>EQUIPMENT AND BASIC PROCEDURES</b><br>
   Use of equipment; funndamental operations, etc.</font></td>
</tr><tr>
<td align="right" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">31</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">MON</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1"><br>2</font></td>
<td bgcolor="#F8F7D9"><font face="arial" size="-1"><b>LETTERING</b><br>
   Lettering form and technique</font></td>
</tr><tr>
<td align="right" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">SEP 2</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">WED</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1"><br>3</font></td>
<td bgcolor="#F8F7D9"><font face="arial" size="-1"><b>SYMBOLS</b><br>
   Materials symbols and applications</font></td>
</tr><tr>
<td align="right" valign="top"><font face="arial" size="-1">9</font></td>
<td align="center" valign="top"><font face="arial" size="-1">WED</font></td>
<td align="center" valign="top"><font face="arial" size="-1"><br>4</font></td>
<td><font face="arial" size="-1"><b>DRAFTING GEOMETRY</b><br>
   Basic constructions</font></td>
</tr><tr>
<td align="right" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">14</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">MON</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">5</font></td>
<td bgcolor="#F8F7D9"><font face="arial" size="-1">
   Application of constructions</font></td>
</tr><tr>
<td align="right" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">16</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">WED</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1"><br>6</font></td>
<td bgcolor="#F8F7D9"><font face="arial" size="-1"><b>ORTHOGRAPHIC DRAWING (three-view drawing)</b><br>
   Video; practice drawings.</font></td>
</tr><tr>
<td align="right" valign="top"><font face="arial" size="-1">21</font></td>
<td align="center" valign="top"><font face="arial" size="-1">MON</font></td>
<td align="center" valign="top"><font face="arial" size="-1">7</font></td>
<td><font face="arial" size="-1">
   Applications</font></td>
</tr><tr>
<td align="right" valign="top"><font face="arial" size="-1">23</font></td>
<td align="center" valign="top"><font face="arial" size="-1">WED</font></td>
<td align="center" valign="top"><font face="arial" size="-1"><br>8</font></td>
<td><font face="arial" size="-1"><b>DIMENSIONING</b><br>
   Principles and standards of size description; practice problems</font></td>
</tr><tr>
<td align="right" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">28</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">MON</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">9</font></td>
<td bgcolor="#F8F7D9"><font face="arial" size="-1">
   Detailed dimensioning</font></td>
</tr><tr>
<td align="right" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">30</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">WED</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1"><br>10<br><br>11</font></td>
<td bgcolor="#F8F7D9"><font face="arial" size="-1"><b>AUXILIARY VIEWS</b><br>
   Theory and types of auxiliaries; drawing practice<br>
<b>SECTIONAL VIEWS</b><br>
   Types of sections; simple drawing practice</font></td>
</tr><tr>
<td align="right" valign="top"><font face="arial" size="-1">OCT 5</font></td>
<td align="center" valign="top"><font face="arial" size="-1">MON</font></td>
<td align="center" valign="top"><font face="arial" size="-1">12</font></td>
<td><font face="arial" size="-1">
   Applications</font></td>
</tr><tr>
<td align="right" valign="top"><font face="arial" size="-1">7</font></td>
<td align="center" valign="top"><font face="arial" size="-1">WED</font></td>
<td align="center" valign="top"><font face="arial" size="-1"><br>13</font></td>
<td><font face="arial" size="-1"><b>PICTORIAL DRAWING</b><br>
   Isometric drawing -- standards, procedures, and practice problems</font></td>
</tr><tr>
<td align="right" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">12</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">MON</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">14</font></td>
<td bgcolor="#F8F7D9"><font face="arial" size="-1">
   Basic isometric drawing</font></td>
</tr><tr>
<td align="right" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">14</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">WED</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">15</font></td>
<td bgcolor="#F8F7D9"><font face="arial" size="-1">
   Perspective drawing -- theory, procedures, simple practice problem.  Last day day to withdraw from the course is Friday this week.</font></td>
</tr><tr>
<td align="right" valign="top"><font face="arial" size="-1">19</font></td>
<td align="center" valign="top"><font face="arial" size="-1">MON</font></td>
<td align="center" valign="top"><font face="arial" size="-1">16</font></td>
<td><font face="arial" size="-1">
   Application of perspective drawing procedures</font></td>
</tr><tr>
<td align="right" valign="top"><font face="arial" size="-1">21</font></td>
<td align="center" valign="top"><font face="arial" size="-1">WED</font></td>
<td align="center" valign="top"><font face="arial" size="-1"><br>17</font></td>
<td><font face="arial" size="-1"><b>THREADS</b><br>
   Thread forms and drawing procedures -- detailed representation</font></td>
</tr><tr>
<td align="right" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">26</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">MON</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">18</font></td>
<td bgcolor="#F8F7D9"><font face="arial" size="-1">
   Nuts and bolts -- schematic representation</font></td>
</tr><tr>
<td align="right" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">28</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">WED</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1"><br>19<br><br>20</font></td>
<td bgcolor="#F8F7D9"><font face="arial" size="-1"><b>WELDMENTS</b><br>
   Types, symbols, and drawing conventions<br>
<b>DEVELOPMENTS</b><br>
   Theory and procedures; practice problem -- simple, flat-sided object</font></td>
</tr><tr>
<td align="right" valign="top"><font face="arial" size="-1">NOV 2</font></td>
<td align="center" valign="top"><font face="arial" size="-1">MON</font></td>
<td align="center" valign="top"><font face="arial" size="-1"><br>21</font></td>
<td><font face="arial" size="-1"><b>INTRODUCTION TO DESCRIPTIVE GEOMETRY</b><br>
   Theory; points and lines in space; successive views</font></td>
</tr><tr>
<td align="right" valign="top"><font face="arial" size="-1">4</font></td>
<td align="center" valign="top"><font face="arial" size="-1">WED</font></td>
<td align="center" valign="top"><font face="arial" size="-1">22</font></td>
<td><font face="arial" size="-1">
   True lengths and pojnt projections</font></td>
</tr><tr>
<td align="right" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">9</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">MON</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">23</font></td>
<td bgcolor="#F8F7D9"><font face="arial" size="-1">
   Edge views and true shapes</font></td>
</tr><tr>
<td align="right" valign="top"><font face="arial" size="-1">16</font></td>
<td align="center" valign="top"><font face="arial" size="-1">MON</font></td>
<td align="center" valign="top"><font face="arial" size="-1"><br>24</font></td>
<td><font face="arial" size="-1"><b>INTRODUCTION TO COMPUTER DRAFTING</b><br>
   Basic operations</font></td>
</tr><tr>
<td align="right" valign="top"><font face="arial" size="-1">18</font></td>
<td align="center" valign="top"><font face="arial" size="-1">WED</font></td>
<td align="center" valign="top"><br></td>
<td><font face="arial" size="-1">
   CAD operations</font></td>
</tr><tr>
<td align="right" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">23</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">MON</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">25</font></td>
<td bgcolor="#F8F7D9"><font face="arial" size="-1">
   CAD operations</font></td>
</tr><tr>
<td align="right" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">25</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">WED</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><br></td>
<td bgcolor="#F8F7D9"><font face="arial" size="-1">
   CAD Operations</font></td>
</tr><tr>
<td align="right" valign="top"><font face="arial" size="-1">30</font></td>
<td align="center" valign="top"><font face="arial" size="-1">MON</font></td>
<td align="center" valign="top"><font face="arial" size="-1"><br>26</font></td>
<td><font face="arial" size="-1"><b>ARCHITECTURAL WORKING DRAWINGS</b><br>
   Basic floor plans</font></td>
</tr><tr>
<td align="right" valign="top"><font face="arial" size="-1">DEC 2</font></td>
<td align="center" valign="top"><font face="arial" size="-1">WED</font></td>
<td align="center" valign="top"><br></td>
<td><font face="arial" size="-1">
   Dimensioning the basic plan</font></td>
</tr><tr>
<td align="right" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">7</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">MON</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">27</font></td>
<td bgcolor="#F8F7D9"><font face="arial" size="-1">
   Basic building construction and wall sections</font></td>
</tr><tr>
<td align="right" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">9</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><font face="arial" size="-1">WED</font></td>
<td align="center" valign="top" bgcolor="#F8F7D9"><br></td>
<td bgcolor="#F8F7D9"><font face="arial" size="-1">
   Labeling and dimensioning wall sections</font></td>
</tr><tr>
<td align="right" bgcolor="#D6D6D6"><font face="arial" size="-1">14</font></td>
<td align="center" bgcolor="#D6D6D6"><font face="arial" size="-1">MON</font></td>
<td bgcolor="#D6D6D6"><br></td>
<td bgcolor="#D6D6D6"><font face="arial" size="-1"><em>Final Exam, 5:30-8:20</em></font></td>
</tr>
</tbody></table></center>
<p>
</p><center>

<a href="https://www.honolulu.hawaii.edu/facdev/guidebk/teachtip/teachtip.htm"><img src="./SYLLABUS EXAMPLE (CLASSROOM COURSE)_files/tips-but.gif" width="137" height="23" alt="Teaching Tips Index" border="0"></a> 
<a href="https://www.honolulu.hawaii.edu/facdev/guidebk/guidebk.htm">
<img src="./SYLLABUS EXAMPLE (CLASSROOM COURSE)_files/gui-but.gif" width="137" height="23" alt="Faculty Guidebook" border="0"></a> 
<a href="https://www.honolulu.hawaii.edu/facdev/index.htm">
<img src="./SYLLABUS EXAMPLE (CLASSROOM COURSE)_files/fac-but.gif" width="137" height="23" alt="Faculty Home Page" border="0"></a> 
<a href="http://www.honolulu.hawaii.edu/intranet">
<img src="./SYLLABUS EXAMPLE (CLASSROOM COURSE)_files/hcc-but.gif" width="137" height="23" alt="Intranet Home Page" border="0"></a></center>
<br>

</section>
        
</div>
