# Projet Flask sur Azure avec Kubernetes et Terraform

## Prérequis
- Compte Microsoft Azure
- Azure CLI
- Terraform
- Docker
- minikube
- kubectl
- Helm

## Configuration de l'Environnement

### Connexion à Azure
```
az login
```

### Initialisation de Terraform
```
cd terraform
terraform init
```

### Application des Configurations Terraform

Dans le dossier terraform, ouvrez le fichier variables.tf et changez la valeur de la variable "acr_name", il faut que ça soit une valeur unique.

Dans le dossier kubernetes, ouvrez le fichier flask-deployment.yaml et remplacez la valeur de l'image (ligne 17) par la valeur de la variable "acr_name"

Pour les prochaines commandes, remplacez <acr_name> par la valeur de la variable "acr_name"

Récupérez votre subscription ID sur cet url : https://portal.azure.com/#view/Microsoft_Azure_Billing/SubscriptionsBladeV2
Récupérez votre tenant ID avec cette commande :
```
az account tenant list
```

puis executez cette commande :

```
terraform apply

```

Une fois la commande terminée, notez bien la valeur de "public_ip_address"


## Construction et Push de l'Image Docker

### Connexion à Azure Container Registry
```
az acr login --name <acr_name>
```

Attention, le nom de l'Azure Container Registry est case-sensitive.
### Construction de l'Image Docker
```
cd ../flask-app
docker build -t <acr_name>.azurecr.io/flask-app:v1 .
```

### Push de l'Image dans Azure Container Registry

```
docker push <acr_name>.azurecr.io/flask-app:v1
```
Attention, si vous êtes sur macOS, vous devez utiliser car la plateforme AMD64 est requise pour AKS alors que la plateforme ARM64 est utilisée par défaut sur macOS.

```
docker buildx build --platform=linux/amd64 -t <acr_name>.azurecr.io/flask-app:v2 --push
```

## Déploiement avec Kubernetes et Helm

### Créer un Secret Kubernetes pour l'Azure Container Registry qui est utilisé dans notre service Kubernetes
```
cd ../kubernetes

minikube start

kubectl create secret docker-registry acr-auth \
  --docker-server=<acr_name>.azurecr.io \
  --docker-username=<acr-username> \
  --docker-password=<acr-password>
```

Les champs <acr-username> et <acr-password> sont trouvables dans la page de votre Azure Container Registry en cliquant sur "Access Keys".

### Déployer l'Ingress Controller avec Helm
```
helm repo add ingress-nginx https://kubernetes.github.io/ingress-nginx
helm repo update
helm install ingress-nginx ingress-nginx/ingress-nginx \
    --set controller.service.loadBalancerIP=<kubernetes -- configuration d'adresse ip frontale> \
    --set controller.service.externalTrafficPolicy=Local \
    -n ingress-nginx
```

### Appliquer les Fichiers Kubernetes
```
kubectl apply -f flask-deployment.yaml
kubectl apply -f flask-service.yaml
kubectl apply -f redis-deployment.yaml
kubectl apply -f redis-service.yaml
kubectl apply -f flask-ingress.yaml
```

# Si vous avez créer l'image v2 sur macOS
```
kubectl set image deployment/flask-app flask-app=<acr_ame>.azurecr.io/flask-app:v2
```

### Vérifier les Pods et Services
```
kubectl get all
kubectl get services -n ingress-nginx
kubectl get pods -n ingress-nginx
```


### Accéder à l'Application Flask
Utilisez l'external ip attribuée à l'Ingress pour accéder à l'application.
