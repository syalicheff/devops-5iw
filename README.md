# Projet Flask sur Azure avec Kubernetes et Terraform

## Prérequis
- Compte Microsoft Azure
- Azure CLI
- Terraform
- Docker
- kubectl
- Helm

## Configuration de l'Environnement

### Connexion à Azure
```
az login 
```

### Initialisation de Terraform
```
terraform init
```

### Application des Configurations Terraform
```
terraform apply
```

## Construction et Push de l'Image Docker

### Connexion à Azure Container Registry
```
az acr login --name acresgisebbenjamin
```

Attention, le nom de l'Azure Container Registry est case-sensitive.
### Construction de l'Image Docker
``` 
docker build -t acresgisebbenjamin.azurecr.io/flask-app:v1 .
```

### Push de l'Image dans Azure Container Registry

```
docker push acresgisebbenjamin.azurecr.io/flask-app:v1
```
Attention, si vous êtes sur macOS, vous devez utiliser car la plateforme AMD64 est requise pour AKS alors que la plateforme ARM64 est utilisée par défaut sur macOS.

```
docker buildx build --platform=linux/amd64 -t acresgisebbenjamin.azurecr.io/flask-app:v2 --push
```

## Déploiement avec Kubernetes et Helm

### Créer un Secret Kubernetes pour l'Azure Container Registry qui est utilisé dans notre service Kubernetes
``` 
kubectl create secret docker-registry acr-auth \
  --docker-server=acresgisebbenjamin.azurecr.io \
  --docker-username=<acr-username> \
  --docker-password=<acr-password> \
  --docker-email=<your-email> 
```

Les champs <acr-username>, <acr-password> et <your-email> sont trouvables dans la page de votre Azure Container Registry en cliquant sur "Access Keys".

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
kubectl set image deployment/flask-app flask-app=acresgisebbenjamin.azurecr.io/flask-app:v2
```

### Vérifier les Pods et Services
```
kubectl get all
kubectl get services -n ingress-nginx
kubectl get pods -n ingress-nginx
```


### Accéder à l'Application Flask
Utilisez l'external ip attribuée à l'Ingress pour accéder à l'application.
