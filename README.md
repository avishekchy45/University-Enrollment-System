# SD-PROJECT-04
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
![Visitors](https://visitor-badge.glitch.me/badge?page_id=github.com/avishekchy45/SD-PROJECT-04)


## Description
During Enrollment, sometimes it happens that, student has exceeded the limit of credit. And sometimes a student can’t enroll as the section has already the maximum number of students enrolled. Then manual entry is given.

All the procedures during enrollment of an university has been implemented in this project. During enrollment, while a student selects a subject, if there is any limit, then message will be shown immediately. Option for the teacher will also be available to give the manual entry. Besides, this project will generate a list of overlapped courses after pre-enrollment which will be helpful for teachers to make class routine. This project assumes that the routine is not yet completed. The aim of this project is to find those courses having no overlapping students. 

## Deployments
![Heroku](https://heroku-badge.herokuapp.com/?app=heroku-badge)

[Live Demo](puais.herokuapp.com)

## Table of Contents
- [Installation](#installation)
- [Tools Used](#tools-used)
- [Usage](#usage)
    - [Admin Panel](#admin-panel)
    - [Teacher Panel](#teacher-panel)
    - [Student Panel](#student-panel)
    - [Snapshots](#some-snapshots)
- [Credits](#credits)
- [License](#license)


## Installation
1. Run  ```git clone "Repository Link"```

2. Go to Project Folder

3. Run ```composer install```

4. Run ```cp .env.example .env or copy .env.example .env```

5. Run ```php artisan key:generate```

6. Run ```php artisan migrate``` / Import SQL file

7. Run ```php artisan serve```

7. Run ```php artisan db:seed```

To login as admin => ID: `demo_admin`  Pass: `123456`

To login as student => ID: `demo_student`  Pass: `123456`

To login as teacher => ID: `demo_teacher`  Pass: `123456`

## Tools Used
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![BOOTSTRAP](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![JQUERY](https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white)
![MYSQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)
![GIT](https://img.shields.io/badge/Git-F05032?style=for-the-badge&logo=git&logoColor=white)

## Usage
This project has three different panels of independent responsibility which are Admin Panel, Student Panel & Teacher Panel.

### Admin Panel
#### Responsibilities are to:
- Create Teacher ID with default Password, Update Teacher info, Delete Teacher ID.
- Assign Teacher as an Advisor of a Batch, Update Advising batch, Delete Advisor.
- Create Student ID with default Password, Update Student info, Delete Student ID
- Create Course, Update Course info, Delete Course.
- Create Session, Update Session Status(Running & Closed).
- Specify Course Limitations(Student per Section, Credit per Student,Cost per Credit)
- Collect the Overlap List

### Student Panel
#### Responsibilities are to:
- Update his/her profile info(Name, E-mail, Password etc.)
- Send request to his/her Advisor to enroll multiple courses of running session.
- Check status(Pending, Aprroved, Rejected) of sent request.

### Teacher Panel
#### Responsibilities are to:
- Update his/her profile info(Name, E-mail, Password etc.)
- Enroll his/her advising student to any courses of running session flying in the face of any limitation.
- Update status(Accept, Reject) of sent requests by his/her advising students.

### Some Snapshots


## Collaborators
<a href="https://github.com/avishekchy45/SD-PROJECT-04/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=avishekchy45/SD-PROJECT-04" />
</a>

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[![MIT License][license-shield]][license-url]


<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/avishekchy45/SD-PROJECT-04.svg
[contributors-url]: https://github.com/avishekchy45/SD-PROJECT-04/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/avishekchy45/SD-PROJECT-04.svg
[forks-url]: https://github.com/avishekchy45/SD-PROJECT-04/network/members
[stars-shield]: https://img.shields.io/github/stars/avishekchy45/SD-PROJECT-04.svg
[stars-url]: https://github.com/avishekchy45/SD-PROJECT-04/stargazers
[issues-shield]: https://img.shields.io/github/issues/avishekchy45/SD-PROJECT-04.svg
[issues-url]: https://github.com/avishekchy45/SD-PROJECT-04/issues
[license-shield]: https://img.shields.io/github/license/avishekchy45/SD-PROJECT-04.svg?style=for-the-badge
[license-url]: https://github.com/avishekchy45/SD-PROJECT-04/blob/main/LICENSE.txt
