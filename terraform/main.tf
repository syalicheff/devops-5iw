provider "azurerm" {
  features {}
  tenant_id = var.tenant_id
  subscription_id = var.subscription_id
}

# Groupe de ressources
resource "azurerm_resource_group" "esgi" {
  name     = var.resource_group_name
  location = var.location
}

# Registre de conteneurs
resource "azurerm_container_registry" "acr" {
  name                = var.acr_name
  resource_group_name = azurerm_resource_group.esgi.name
  location            = azurerm_resource_group.esgi.location
  sku                 = "Standard"
  admin_enabled       = true
}

# Cluster Kubernetes
resource "azurerm_kubernetes_cluster" "aks" {
  name                = var.aks_name
  location            = azurerm_resource_group.esgi.location
  resource_group_name = azurerm_resource_group.esgi.name
  dns_prefix          = var.aks_dns_prefix

  default_node_pool {
    name       = "default"
    node_count = 1
    vm_size    = "Standard_B2s"
  }

  identity {
    type = "SystemAssigned"
  }
}


resource "azurerm_public_ip" "publicip" {
  name                = var.public_ip_name
  location            = azurerm_resource_group.esgi.location
  resource_group_name = azurerm_kubernetes_cluster.aks.node_resource_group // Utiliser le groupe de ressources du nœud AKS
  allocation_method   = "Static"
  sku                 = "Standard"
}


# Règle de pare-feu pour le registre de conteneurs AcrPull pour que le cluster Kubernetes puisse tirer des images 
resource "azurerm_role_assignment" "acr_role_assignment" {
  scope                = azurerm_container_registry.acr.id
  role_definition_name = "AcrPull"
  principal_id         = azurerm_kubernetes_cluster.aks.identity[0].principal_id
}

# Règle de pare-feu pour le registre de conteneurs AcrPush pour que je puisse pousser des images
resource "azurerm_role_assignment" "acr_role_assignment_push" {
  scope                = azurerm_container_registry.acr.id
  role_definition_name = "AcrPush"
  principal_id         = azurerm_kubernetes_cluster.aks.identity[0].principal_id
}

