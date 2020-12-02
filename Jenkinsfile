pipeline {
	agent any
	stages {	
		
		stage('Unit And UI Tests') {
			steps {
                sh 'phpunit --log-junit logs/unitreport.xml -c tests/phpunit.xml tests'
            }
		}

	}
	post {
		always{
			junit testResults: 'logs/unitreport.xml'
		}
	}
}

