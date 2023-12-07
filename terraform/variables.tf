variable "location" {
  description = "La localisation géographique où les ressources seront déployées"
  default     = "westeurope"
}

variable "resource_group_name" {
  description = "Le nom du groupe de ressources"
  default     = "rg-ESGI-SebBenjamin"
}

variable "acr_name" {
  description = "Le nom du Azure Container Registry"
  default     = "acrESGISebBenjamin"
}

variable "aks_name" {
  description = "Le nom du Azure Kubernetes Service"
  default     = "aks-ESGI-SebBenjamin"
}

variable "aks_dns_prefix" {
  description = "Le DNS prefix pour AKS"
  default     = "aks-ESGI-SebBenjamin-dns"
}

variable "public_ip_name" {
  description = "Le nom de l'adresse IP publique"
  default     = "pip-ESGI-SebBenjamin"
}

variable "tenant_id" {
  description = "L'ID du tenant Azure"
}

variable "subscription_id" {
  description = "L'ID de l'abonnement Azure"
}