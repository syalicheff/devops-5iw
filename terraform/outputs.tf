output "resource_group_id" {
  value       = azurerm_resource_group.esgi.id
  description = "L'ID du groupe de ressources créé"
  sensitive = false
}

output "acr_login_server" {
  value       = azurerm_container_registry.acr.login_server
  description = "Le serveur de login pour le Azure Container Registry"
  sensitive = false
}

output "aks_kube_config" {
  value       = azurerm_kubernetes_cluster.aks.kube_config_raw
  description = "La configuration kube pour le Azure Kubernetes Service"
  sensitive = true
}

output "public_ip_address" {
  value       = azurerm_public_ip.publicip.ip_address
  description = "L'adresse IP publique créée pour l'application"
  sensitive = false
}