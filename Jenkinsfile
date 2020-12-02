pipeline {
	agent any
	stages {	
		stage('Test') {
			steps {
                sh 'phpunit --log-junit logs/unitreport.xml -c tests/phpunit.xml tests'
            }
		}
		stage('Code Quality Check via SonarQube') {
		steps {
			script {
				def scannerHome = tool 'SonarQube';
				withSonarQubeEnv() {
					sh "${tool("SonarQube")}/bin/sonar-scanner \
					-Dsonar.projectKey=ict3103 \
					-Dsonar.sources=. \
					-Dsonar.host.url=http://35.240.224.118:9000 \
					-Dsonar.login=cd636c6c1b2066d3348500ea6b8f1471a82f47a8"
					}
				}
			}
		}

		stage('OWASP DependencyCheck') {
			steps {
				dependencyCheck additionalArguments: '--format HTML --format XML', odcInstallation: 'OWASP Dependency-Check'
			}
		}
	}
	post {
		always{
			recordIssues enabledForFailure: true, tools: [sonarQube()]
			recordIssues(tools: [php()])

		}
		success {
			dependencyCheckPublisher pattern: 'dependency-check-report.xml'
		}
	}
}

