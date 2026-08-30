pipeline {
    agent any
    
    environment {
        ECR_REGISTRY = '447150580520.dkr.ecr.us-east-1.amazonaws.com' 
        ECR_REPO = 'php-capstone-app'
        IMAGE_TAG = "${env.BUILD_NUMBER}"
        AWS_REGION = 'us-east-1'
    }

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }
        
        stage('Build Docker Image') {
            steps {
                sh "docker build -t ${ECR_REGISTRY}/${ECR_REPO}:${IMAGE_TAG} ."
            }
        }
        
        stage('Push to Amazon ECR') {
            steps {
                // Logs into AWS ECR and pushes the newly built image
                sh """
                aws ecr get-login-password --region ${AWS_REGION} | docker login --username AWS --password-stdin ${ECR_REGISTRY}
                docker push ${ECR_REGISTRY}/${ECR_REPO}:${IMAGE_TAG}
                """
            }
        }
        
        stage('Deploy via Helm') {
            steps {
                // Deploys the Helm chart to your K8s cluster with the new image tag
                sh """
                helm upgrade --install capstone-release ./php-app \
                  --set image.repository=${ECR_REGISTRY}/${ECR_REPO} \
                  --set image.tag=${IMAGE_TAG}
                """
            }
        }
    }
}
