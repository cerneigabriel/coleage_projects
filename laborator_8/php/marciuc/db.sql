CREATE DATABASE IF NOT EXISTS `quiz_marciuc`;
USE `quiz_marciuc`;

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `answers` varchar(500) NOT NULL,
  `multiple_correct_answers` varchar(10) DEFAULT NULL,
  `correct_answers` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `questions` (`id`, `question`, `description`, `answers`, `multiple_correct_answers`, `correct_answers`) VALUES
(294, 'What is a permalink?', NULL, '{\"answer_a\":\"A popular WordPress Plugin\",\"answer_b\":\"The numeric IP address of your WordPress site\",\"answer_c\":\"The complete URL of your WordPress site\",\"answer_d\":\"Permalinks are the permanent URLs to your individual pages and blog posts, as well as your category and tag archives\",\"answer_e\":\"A permalink is the web address used to link to your content.\",\"answer_f\":null}', 'true', '{\"answer_a_correct\":\"false\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"true\",\"answer_e_correct\":\"true\",\"answer_f_correct\":\"false\"}'),
(350, 'Normalizations is...', NULL, '{\"answer_a\":\"concerned with the physical implementation of the database\",\"answer_b\":\"a database design technique that encourages storing data in multiple databases\",\"answer_c\":\"a database design technique that eliminates relationships from a database\",\"answer_d\":\"a database design technique used to minimize data redundancy and duplication\",\"answer_e\":null,\"answer_f\":null}', 'true', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"true\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(354, 'Which of the following SQL statements will generate an error when executed.', NULL, '{\"answer_a\":\"CREATE DATABASE students\",\"answer_b\":\"IF NOT EXISTS CREATE DATABASE `STUDENTS`;\",\"answer_c\":\"CREATE DATABASE students;\",\"answer_d\":\"create database if not exists students\",\"answer_e\":\"select * from students where student_id=%23;\",\"answer_f\":\"select * from students student_id=23;\"}', 'true', '{\"answer_a_correct\":\"false\",\"answer_b_correct\":\"true\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"true\",\"answer_f_correct\":\"true\"}'),
(580, 'What is Joomla in PHP?', NULL, '{\"answer_a\":\"Set of library enriched with fucntions\",\"answer_b\":\"Framework for designing dynamic pages\",\"answer_c\":\"An open source CMS\",\"answer_d\":\"framework and distribution system for reusable PHP components\",\"answer_e\":null,\"answer_f\":null}', 'true', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"true\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(679, 'Which are the three looping constructs provided by shell', NULL, '{\"answer_a\":\"while\",\"answer_b\":\"for\",\"answer_c\":\"until\",\"answer_d\":\"foreach\",\"answer_e\":\"done\",\"answer_f\":\"each\"}', 'true', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"true\",\"answer_c_correct\":\"true\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(753, 'How do you write the contents of 3 files into a single file?', NULL, '{\"answer_a\":\"cat file1 file2 file3 > file\",\"answer_b\":\"cat file1 > file && cat file2 >> file && cat file3 >> file\",\"answer_c\":\"cat file1 >> file; cat file2 >> file; cat file3 >> file\",\"answer_d\":\"cat file1 > file && cat file2 > file && cat file3 > file\",\"answer_e\":\"cat file1 > file || cat file2 > file || cat file3 > file\",\"answer_f\":\"cat file1 > file; cat file2 > file; cat file3 > file\"}', 'true', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"true\",\"answer_c_correct\":\"true\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(774, 'Which of the following is correct about NULL?', NULL, '{\"answer_a\":\"NULL is a special type that only has one value: NULL.\",\"answer_b\":\"The special constant NULL is capitalized by convention, but actually it is case insensitive.\",\"answer_c\":\"NULL is a special type that only has two values : NULL and NOT NULL\",\"answer_d\":\"The special constant NULL is capitalized by convention and it should be defined as such as it\'s case sensitive. Meaning null is different than NULL\",\"answer_e\":null,\"answer_f\":null}', 'true', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"true\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(775, 'Using which of the following way can you embed PHP code in an HTML page?', NULL, '{\"answer_a\":\"<?php PHP code goes here ?>\",\"answer_b\":\"<? PHP code goes here ?>\",\"answer_c\":\"<script language=\\\"php\\\"> PHP code goes here <\\/script>\",\"answer_d\":\"<? PHP code goes here\",\"answer_e\":\"<?php PHP code goes here php?>\",\"answer_f\":null}', 'true', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"true\",\"answer_c_correct\":\"true\",\"answer_d_correct\":\"true\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(780, 'Which of the mentioned are valid PHP loops', NULL, '{\"answer_a\":\"for\",\"answer_b\":\"while\",\"answer_c\":\"do ... while\",\"answer_d\":\"foreach\",\"answer_e\":\"each\",\"answer_f\":\"beforeeach\"}', 'true', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"true\",\"answer_c_correct\":\"true\",\"answer_d_correct\":\"true\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(784, 'Which of the following is NOT a  valid mode fopen() mode :', NULL, '{\"answer_a\":\"r\",\"answer_b\":\"r+\",\"answer_c\":\"w\",\"answer_d\":\"a\",\"answer_e\":\"x\",\"answer_f\":\"x+\"}', 'true', '{\"answer_a_correct\":\"false\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"true\",\"answer_f_correct\":\"true\"}'),
(785, 'If we want to open a file for reading and writing which mode of the function fopen() are we going to use:', NULL, '{\"answer_a\":\"r+\",\"answer_b\":\"w+\",\"answer_c\":\"r\",\"answer_d\":\"x\",\"answer_e\":\"x+\",\"answer_f\":null}', 'true', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"true\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(786, 'If we want to be sure a file will be created if it doesn\'t exesit with fopen() which mode of the function are we going ot use:', NULL, '{\"answer_a\":\"a\",\"answer_b\":\"a+\",\"answer_c\":\"r+\",\"answer_d\":\"w+\",\"answer_e\":\"x+\",\"answer_f\":\"x\"}', 'true', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"true\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(790, 'Which of the mentioned are the neccessary/mandatory arguments of the mail function.', NULL, '{\"answer_a\":\"to\",\"answer_b\":\"subject\",\"answer_c\":\"message\",\"answer_d\":\"headers\",\"answer_e\":\"parameters\",\"answer_f\":\"number of recepients\"}', 'true', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"true\",\"answer_c_correct\":\"true\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(871, 'Volume mapping maps the host server\'s directory into the Docker container. The data will remain in a safe and accessible place if you do which of the following?', NULL, '{\"answer_a\":\"re-create the container\",\"answer_b\":\"backup the container\",\"answer_c\":\"delete the container\",\"answer_d\":\"migrate the container\",\"answer_e\":\"break the container\",\"answer_f\":null}', 'true', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"true\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"true\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(876, 'Choose the system requirements you need to run Docker on a Plesk Onyx Server:', NULL, '{\"answer_a\":\"20GB of free disk space\",\"answer_b\":\"At least 2GB of RAM\",\"answer_c\":\"A compatible Linux OS\",\"answer_d\":\"A 64-bit CPU\",\"answer_e\":\"One physical server\",\"answer_f\":null}', 'true', '{\"answer_a_correct\":\"false\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"true\",\"answer_d_correct\":\"true\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(963, 'Select all true statements for a node in Kubernetes?', NULL, '{\"answer_a\":\"A node is a worker machine in Kubernetes, previously known as a minion\",\"answer_b\":\"Each node contains the services necessary to run pods and is managed by the master components\",\"answer_c\":\"A node may be a VM or physical machine, depending on the cluster.\",\"answer_d\":\"There is only one node in each Kubernetes cluster\",\"answer_e\":null,\"answer_f\":null}', 'true', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"true\",\"answer_c_correct\":\"true\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(971, 'Which of the following are true for etcd?', NULL, '{\"answer_a\":\"etcd is the primary datastore of Kubernetes; storing and replicating all Kubernetes cluster state\",\"answer_b\":\"etcd is a distributed key-value store\",\"answer_c\":\"To encrypt cluster data and send it to a secrets manager\",\"answer_d\":\"To validate cluster nodes\",\"answer_e\":null,\"answer_f\":null}', 'true', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"true\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1006, 'Which one is true for Minikube?', NULL, '{\"answer_a\":\"Minikube is an all-in-One Kubernetes cluster on our workstation\",\"answer_b\":\"Minikube multi-node cluster\",\"answer_c\":\"Minikube is a GUI for Kubernetes\",\"answer_d\":\"None of the above\",\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1010, 'While starting minikube, a configuration file, gets created by default inside what directory on Linux?', NULL, '{\"answer_a\":\"\\/tmp\",\"answer_b\":\"\\/home\\/user\\/.kube\",\"answer_c\":\"\\/root\",\"answer_d\":\"\\/home\\/user\",\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"false\",\"answer_b_correct\":\"true\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1012, 'What is the most common type of container runtime used in Kubernetes?', NULL, '{\"answer_a\":\"rkt\",\"answer_b\":\"Docker\",\"answer_c\":\"containerd\",\"answer_d\":\"lxd\",\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"false\",\"answer_b_correct\":\"true\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1020, 'Which Process Runs On Kubernetes Master Node?', NULL, '{\"answer_a\":\"Kube-cli-proxy process runs on Kubernetes master node.\",\"answer_b\":\"Kube-cli-server process runs on Kubernetes master node.\",\"answer_c\":\"Kube-apiserver process runs on Kubernetes master node.\",\"answer_d\":null,\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"false\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"true\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1023, 'What does the FROM instruction do in a Dockerfile?', NULL, '{\"answer_a\":\"FROM creates a layer from a base Docker image.\",\"answer_b\":\"FROM specifies the creator of the image\",\"answer_c\":\"FROM is an invalid instruction\",\"answer_d\":\"FROM adds files from your Docker client\\u2019s current directory\",\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1025, 'How to initialize a docker swarm?', 'For more information check the official documentation here: https://docs.docker.com/engine/reference/commandline/swarm_init/', '{\"answer_a\":\"docker swarm init --advertise-addr your_server_ip_here\",\"answer_b\":\"docker init swarm --advertise-addr your_server_ip_here\",\"answer_c\":\"docker master init --advertise-addr your_server_ip_here\",\"answer_d\":\"docker init --advertise-addr your_server_ip_here\",\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1033, 'How to scale a service to 7 replicas in Docker Swarm?', NULL, '{\"answer_a\":\"docker service scale name_of_your_service_here=7\",\"answer_b\":\"docker service replica-set name_of_your_service_here=7\",\"answer_c\":\"docker service update name_of_your_service_here=7\",\"answer_d\":\"docker service upgrade name_of_your_service_here=7\",\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1043, 'What are Ansible ad-hoc commands?', NULL, '{\"answer_a\":\"Ansible ad-hoc commands are commands which helps you execute simple tasks without the need of creating playbooks\",\"answer_b\":\"Ansible ad-hoc commands are also known as Ansible playbooks\",\"answer_c\":null,\"answer_d\":null,\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1044, 'Which argument do you need to specify in order to run a specific Ansible module?', NULL, '{\"answer_a\":\"--modules\",\"answer_b\":\"-m\",\"answer_c\":\"-ml\",\"answer_d\":\"--ansible-module\",\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"false\",\"answer_b_correct\":\"true\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1045, 'What does the Ansible setup module do?', NULL, '{\"answer_a\":\"It helps you setup Ansible on the master server\",\"answer_b\":\"It helps you install Ansible on all of your servers\",\"answer_c\":\"It shows you the information that the Ansible master server has about a host\",\"answer_d\":\"It sets up the connection between the master and the worker nodes\",\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"false\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"true\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1046, 'Which command will you use to test the connectivity to the host from the master server and make sure that it actually works?', NULL, '{\"answer_a\":\"ansible your_host_name_here -m pong\",\"answer_b\":\"ansible your_host_name_here -m connect\",\"answer_c\":\"ansible your_host_name_here -m try\",\"answer_d\":\"ansible your_host_name_here -m ping\",\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"false\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"true\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1047, 'Which Ansible command will you use to install Apache on Ubuntu host?', NULL, '{\"answer_a\":\"ansible your_host_name_here -b -m apt -a \\\"name=apache2 state=latest\\\"\",\"answer_b\":\"ansible your_host_name_here -b -m yum -a \\\"name=apache2 state=latest\\\"\",\"answer_c\":\"ansible your_host_name_here -b -m wget -a \\\"name=apache2 state=latest\\\"\",\"answer_d\":\"ansible your_host_name_here apt install \\\"name=apache2 state=latest\\\"\",\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1048, 'The -b flag in an Ansible ad-hoc command indicates that the command should be executed with sudo privileges.', NULL, '{\"answer_a\":\"false\",\"answer_b\":\"true\",\"answer_c\":null,\"answer_d\":null,\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"false\",\"answer_b_correct\":\"true\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1054, 'Which command would you use to gather facts with Ansible?', NULL, '{\"answer_a\":\"ansible your_server -m gather\",\"answer_b\":\"ansible your_server -m setup\",\"answer_c\":\"ansible your_server -m info\",\"answer_d\":\"ansible your_server -m fact\",\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"false\",\"answer_b_correct\":\"true\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1056, 'Which of the following values would give you the hostname of the remote host in your Ansible Playbook?', NULL, '{\"answer_a\":\"\\\"{{ ansible_hostname }}\\\"\",\"answer_b\":\"\\\"{{ hostname }}\\\"\",\"answer_c\":\"\\\"{{ server_hostname }}\\\"\",\"answer_d\":\"\\\"{{ host }}\\\"\",\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1058, 'What is Laravel?', NULL, '{\"answer_a\":\"Laravel is an open-source widely used PHP framework.\",\"answer_b\":\"Laravel is an open-source widely used JavaScript framework.\",\"answer_c\":\"Laravel is an open-source widely used Python framework.\",\"answer_d\":\"Laravel is an open-source widely used Ruby framework.\",\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1059, 'What is HTTP middleware in Laravel?', NULL, '{\"answer_a\":\"HTTP middleware is a technique for installing Laravel via HTTP.\",\"answer_b\":\"HTTP middleware is a technique for filtering HTTP requests.\",\"answer_c\":\"HTTP middleware is a technique for updating Laravel via HTTP.\",\"answer_d\":\"HTTP middleware is a web server used by Laravel similar to Apache and Nginx.\",\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"false\",\"answer_b_correct\":\"true\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1069, 'What will happen If you run the command \"init 0\" in your terminal', NULL, '{\"answer_a\":\"Shut down the system\",\"answer_b\":\"Reboot the system\",\"answer_c\":\"Enter single user mode\",\"answer_d\":\"Start the system without a display manager (GUI)\",\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1070, 'What will happen If you run the command \"init 1\" in your terminal', NULL, '{\"answer_a\":\"Reboot the system\",\"answer_b\":\"Shut down the system\",\"answer_c\":\"Enter single user mode\",\"answer_d\":\"Start the system without a display manager (GUI)\",\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"false\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"true\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1072, 'If we wish to mount a directory with Read Only option, which of the following is correct', NULL, '{\"answer_a\":\"mount -t ext4 -o noexect,ro \\/path\\/to-dir \\/mnt\\/folder\",\"answer_b\":\"mount ext4 -no-read-only \\/path\\/to-dir \\/mnt\\/folder\",\"answer_c\":\"mount -t ext4 -o noexect,ro \\/mnt\\/folder \\/path\\/to-dir\",\"answer_d\":\"mount ext4 -no-read-only \\/mnt\\/folder \\/path\\/to-dir\",\"answer_e\":\"mount ext4 noexect,ro \\/path\\/to-dir \\/mnt\\/folder\",\"answer_f\":\"mount ext4 -no-read-only \\/mnt\\/folder \\/path\\/to-dir\"}', 'true', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"true\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1073, 'What is the default priority of the swap partition', NULL, '{\"answer_a\":\"0\",\"answer_b\":\"-1\",\"answer_c\":\"10\",\"answer_d\":\"1\",\"answer_e\":\"There are no priorities for swap\",\"answer_f\":\"100\"}', 'false', '{\"answer_a_correct\":\"false\",\"answer_b_correct\":\"true\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1074, 'How to change the priority of a swap file/partition to 10', NULL, '{\"answer_a\":\"swapon -p 10 \\/path\\/to\\/swapfile\",\"answer_b\":\"We can\'t change the priority of swap partions\",\"answer_c\":\"swapon -P 10 \\/path\\/to\\/swapfile\",\"answer_d\":\"swapon +10 \\/path\\/to\\/swapfile\",\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}'),
(1080, 'Which command do we need to use if we want to see all packages installed on the system (Ubuntu)', NULL, '{\"answer_a\":\"dpkg -l\",\"answer_b\":\"packageall -l\",\"answer_c\":\"dpkg -a\",\"answer_d\":null,\"answer_e\":null,\"answer_f\":null}', 'false', '{\"answer_a_correct\":\"true\",\"answer_b_correct\":\"false\",\"answer_c_correct\":\"false\",\"answer_d_correct\":\"false\",\"answer_e_correct\":\"false\",\"answer_f_correct\":\"false\"}');