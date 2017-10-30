<?php

// This file was auto-generated from sdk-root/src/data/cloudhsmv2/2017-04-28/api-2.json
return ['version' => '2.0', 'metadata' => ['apiVersion' => '2017-04-28', 'endpointPrefix' => 'cloudhsmv2', 'jsonVersion' => '1.1', 'protocol' => 'json', 'serviceAbbreviation' => 'CloudHSM V2', 'serviceFullName' => 'AWS CloudHSM V2', 'signatureVersion' => 'v4', 'signingName' => 'cloudhsm', 'targetPrefix' => 'BaldrApiService', 'uid' => 'cloudhsmv2-2017-04-28',], 'operations' => ['CreateCluster' => ['name' => 'CreateCluster', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'CreateClusterRequest',], 'output' => ['shape' => 'CreateClusterResponse',], 'errors' => [['shape' => 'CloudHsmInternalFailureException',], ['shape' => 'CloudHsmServiceException',], ['shape' => 'CloudHsmResourceNotFoundException',], ['shape' => 'CloudHsmInvalidRequestException',], ['shape' => 'CloudHsmAccessDeniedException',],],], 'CreateHsm' => ['name' => 'CreateHsm', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'CreateHsmRequest',], 'output' => ['shape' => 'CreateHsmResponse',], 'errors' => [['shape' => 'CloudHsmInternalFailureException',], ['shape' => 'CloudHsmServiceException',], ['shape' => 'CloudHsmInvalidRequestException',], ['shape' => 'CloudHsmResourceNotFoundException',], ['shape' => 'CloudHsmAccessDeniedException',],],], 'DeleteCluster' => ['name' => 'DeleteCluster', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'DeleteClusterRequest',], 'output' => ['shape' => 'DeleteClusterResponse',], 'errors' => [['shape' => 'CloudHsmInternalFailureException',], ['shape' => 'CloudHsmServiceException',], ['shape' => 'CloudHsmResourceNotFoundException',], ['shape' => 'CloudHsmInvalidRequestException',], ['shape' => 'CloudHsmAccessDeniedException',],],], 'DeleteHsm' => ['name' => 'DeleteHsm', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'DeleteHsmRequest',], 'output' => ['shape' => 'DeleteHsmResponse',], 'errors' => [['shape' => 'CloudHsmInternalFailureException',], ['shape' => 'CloudHsmServiceException',], ['shape' => 'CloudHsmResourceNotFoundException',], ['shape' => 'CloudHsmInvalidRequestException',], ['shape' => 'CloudHsmAccessDeniedException',],],], 'DescribeBackups' => ['name' => 'DescribeBackups', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'DescribeBackupsRequest',], 'output' => ['shape' => 'DescribeBackupsResponse',], 'errors' => [['shape' => 'CloudHsmInternalFailureException',], ['shape' => 'CloudHsmServiceException',], ['shape' => 'CloudHsmResourceNotFoundException',], ['shape' => 'CloudHsmInvalidRequestException',], ['shape' => 'CloudHsmAccessDeniedException',],],], 'DescribeClusters' => ['name' => 'DescribeClusters', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'DescribeClustersRequest',], 'output' => ['shape' => 'DescribeClustersResponse',], 'errors' => [['shape' => 'CloudHsmInternalFailureException',], ['shape' => 'CloudHsmServiceException',], ['shape' => 'CloudHsmInvalidRequestException',], ['shape' => 'CloudHsmAccessDeniedException',],],], 'InitializeCluster' => ['name' => 'InitializeCluster', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'InitializeClusterRequest',], 'output' => ['shape' => 'InitializeClusterResponse',], 'errors' => [['shape' => 'CloudHsmInternalFailureException',], ['shape' => 'CloudHsmServiceException',], ['shape' => 'CloudHsmResourceNotFoundException',], ['shape' => 'CloudHsmInvalidRequestException',], ['shape' => 'CloudHsmAccessDeniedException',],],], 'ListTags' => ['name' => 'ListTags', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'ListTagsRequest',], 'output' => ['shape' => 'ListTagsResponse',], 'errors' => [['shape' => 'CloudHsmInternalFailureException',], ['shape' => 'CloudHsmServiceException',], ['shape' => 'CloudHsmResourceNotFoundException',], ['shape' => 'CloudHsmInvalidRequestException',], ['shape' => 'CloudHsmAccessDeniedException',],],], 'TagResource' => ['name' => 'TagResource', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'TagResourceRequest',], 'output' => ['shape' => 'TagResourceResponse',], 'errors' => [['shape' => 'CloudHsmInternalFailureException',], ['shape' => 'CloudHsmServiceException',], ['shape' => 'CloudHsmResourceNotFoundException',], ['shape' => 'CloudHsmInvalidRequestException',], ['shape' => 'CloudHsmAccessDeniedException',],],], 'UntagResource' => ['name' => 'UntagResource', 'http' => ['method' => 'POST', 'requestUri' => '/',], 'input' => ['shape' => 'UntagResourceRequest',], 'output' => ['shape' => 'UntagResourceResponse',], 'errors' => [['shape' => 'CloudHsmInternalFailureException',], ['shape' => 'CloudHsmServiceException',], ['shape' => 'CloudHsmResourceNotFoundException',], ['shape' => 'CloudHsmInvalidRequestException',], ['shape' => 'CloudHsmAccessDeniedException',],],],], 'shapes' => ['Backup' => ['type' => 'structure', 'required' => ['BackupId',], 'members' => ['BackupId' => ['shape' => 'BackupId',], 'BackupState' => ['shape' => 'BackupState',], 'ClusterId' => ['shape' => 'ClusterId',], 'CreateTimestamp' => ['shape' => 'Timestamp',],],], 'BackupId' => ['type' => 'string', 'pattern' => 'backup-[2-7a-zA-Z]{11,16}',], 'BackupPolicy' => ['type' => 'string', 'enum' => ['DEFAULT',],], 'BackupState' => ['type' => 'string', 'enum' => ['CREATE_IN_PROGRESS', 'READY', 'DELETED',],], 'Backups' => ['type' => 'list', 'member' => ['shape' => 'Backup',],], 'Cert' => ['type' => 'string', 'max' => 5000, 'pattern' => '[a-zA-Z0-9+-/=\\s]*',], 'Certificates' => ['type' => 'structure', 'members' => ['ClusterCsr' => ['shape' => 'Cert',], 'HsmCertificate' => ['shape' => 'Cert',], 'AwsHardwareCertificate' => ['shape' => 'Cert',], 'ManufacturerHardwareCertificate' => ['shape' => 'Cert',], 'ClusterCertificate' => ['shape' => 'Cert',],],], 'CloudHsmAccessDeniedException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'errorMessage',],], 'exception' => true,], 'CloudHsmInternalFailureException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'errorMessage',],], 'exception' => true, 'fault' => true,], 'CloudHsmInvalidRequestException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'errorMessage',],], 'exception' => true,], 'CloudHsmResourceNotFoundException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'errorMessage',],], 'exception' => true,], 'CloudHsmServiceException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'errorMessage',],], 'exception' => true,], 'Cluster' => ['type' => 'structure', 'members' => ['BackupPolicy' => ['shape' => 'BackupPolicy',], 'ClusterId' => ['shape' => 'ClusterId',], 'CreateTimestamp' => ['shape' => 'Timestamp',], 'Hsms' => ['shape' => 'Hsms',], 'HsmType' => ['shape' => 'HsmType',], 'PreCoPassword' => ['shape' => 'PreCoPassword',], 'SecurityGroup' => ['shape' => 'SecurityGroup',], 'SourceBackupId' => ['shape' => 'BackupId',], 'State' => ['shape' => 'ClusterState',], 'StateMessage' => ['shape' => 'StateMessage',], 'SubnetMapping' => ['shape' => 'ExternalSubnetMapping',], 'VpcId' => ['shape' => 'VpcId',], 'Certificates' => ['shape' => 'Certificates',],],], 'ClusterId' => ['type' => 'string', 'pattern' => 'cluster-[2-7a-zA-Z]{11,16}',], 'ClusterState' => ['type' => 'string', 'enum' => ['CREATE_IN_PROGRESS', 'UNINITIALIZED', 'INITIALIZE_IN_PROGRESS', 'INITIALIZED', 'ACTIVE', 'UPDATE_IN_PROGRESS', 'DELETE_IN_PROGRESS', 'DELETED', 'DEGRADED',],], 'Clusters' => ['type' => 'list', 'member' => ['shape' => 'Cluster',],], 'CreateClusterRequest' => ['type' => 'structure', 'required' => ['SubnetIds', 'HsmType',], 'members' => ['SubnetIds' => ['shape' => 'SubnetIds',], 'HsmType' => ['shape' => 'HsmType',], 'SourceBackupId' => ['shape' => 'BackupId',],],], 'CreateClusterResponse' => ['type' => 'structure', 'members' => ['Cluster' => ['shape' => 'Cluster',],],], 'CreateHsmRequest' => ['type' => 'structure', 'required' => ['ClusterId', 'AvailabilityZone',], 'members' => ['ClusterId' => ['shape' => 'ClusterId',], 'AvailabilityZone' => ['shape' => 'ExternalAz',], 'IpAddress' => ['shape' => 'IpAddress',],],], 'CreateHsmResponse' => ['type' => 'structure', 'members' => ['Hsm' => ['shape' => 'Hsm',],],], 'DeleteClusterRequest' => ['type' => 'structure', 'required' => ['ClusterId',], 'members' => ['ClusterId' => ['shape' => 'ClusterId',],],], 'DeleteClusterResponse' => ['type' => 'structure', 'members' => ['Cluster' => ['shape' => 'Cluster',],],], 'DeleteHsmRequest' => ['type' => 'structure', 'required' => ['ClusterId',], 'members' => ['ClusterId' => ['shape' => 'ClusterId',], 'HsmId' => ['shape' => 'HsmId',], 'EniId' => ['shape' => 'EniId',], 'EniIp' => ['shape' => 'IpAddress',],],], 'DeleteHsmResponse' => ['type' => 'structure', 'members' => ['HsmId' => ['shape' => 'HsmId',],],], 'DescribeBackupsRequest' => ['type' => 'structure', 'members' => ['NextToken' => ['shape' => 'NextToken',], 'MaxResults' => ['shape' => 'MaxSize',], 'Filters' => ['shape' => 'Filters',],],], 'DescribeBackupsResponse' => ['type' => 'structure', 'members' => ['Backups' => ['shape' => 'Backups',], 'NextToken' => ['shape' => 'NextToken',],],], 'DescribeClustersRequest' => ['type' => 'structure', 'members' => ['Filters' => ['shape' => 'Filters',], 'NextToken' => ['shape' => 'NextToken',], 'MaxResults' => ['shape' => 'MaxSize',],],], 'DescribeClustersResponse' => ['type' => 'structure', 'members' => ['Clusters' => ['shape' => 'Clusters',], 'NextToken' => ['shape' => 'NextToken',],],], 'EniId' => ['type' => 'string', 'pattern' => 'eni-[0-9a-fA-F]{8}',], 'ExternalAz' => ['type' => 'string', 'pattern' => '[a-z]{2}(-(gov|isob|iso))?-(east|west|north|south|central){1,2}-\\d[a-z]',], 'ExternalSubnetMapping' => ['type' => 'map', 'key' => ['shape' => 'ExternalAz',], 'value' => ['shape' => 'SubnetId',],], 'Field' => ['type' => 'string', 'pattern' => '[a-zA-Z0-9_-]+',], 'Filters' => ['type' => 'map', 'key' => ['shape' => 'Field',], 'value' => ['shape' => 'Strings',],], 'Hsm' => ['type' => 'structure', 'required' => ['HsmId',], 'members' => ['AvailabilityZone' => ['shape' => 'ExternalAz',], 'ClusterId' => ['shape' => 'ClusterId',], 'SubnetId' => ['shape' => 'SubnetId',], 'EniId' => ['shape' => 'EniId',], 'EniIp' => ['shape' => 'IpAddress',], 'HsmId' => ['shape' => 'HsmId',], 'State' => ['shape' => 'HsmState',], 'StateMessage' => ['shape' => 'String',],],], 'HsmId' => ['type' => 'string', 'pattern' => 'hsm-[2-7a-zA-Z]{11,16}',], 'HsmState' => ['type' => 'string', 'enum' => ['CREATE_IN_PROGRESS', 'ACTIVE', 'DEGRADED', 'DELETE_IN_PROGRESS', 'DELETED',],], 'HsmType' => ['type' => 'string', 'pattern' => '(hsm1\\.medium)',], 'Hsms' => ['type' => 'list', 'member' => ['shape' => 'Hsm',],], 'InitializeClusterRequest' => ['type' => 'structure', 'required' => ['ClusterId', 'SignedCert', 'TrustAnchor',], 'members' => ['ClusterId' => ['shape' => 'ClusterId',], 'SignedCert' => ['shape' => 'Cert',], 'TrustAnchor' => ['shape' => 'Cert',],],], 'InitializeClusterResponse' => ['type' => 'structure', 'members' => ['State' => ['shape' => 'ClusterState',], 'StateMessage' => ['shape' => 'StateMessage',],],], 'IpAddress' => ['type' => 'string', 'pattern' => '\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}',], 'ListTagsRequest' => ['type' => 'structure', 'required' => ['ResourceId',], 'members' => ['ResourceId' => ['shape' => 'ClusterId',], 'NextToken' => ['shape' => 'NextToken',], 'MaxResults' => ['shape' => 'MaxSize',],],], 'ListTagsResponse' => ['type' => 'structure', 'required' => ['TagList',], 'members' => ['TagList' => ['shape' => 'TagList',], 'NextToken' => ['shape' => 'NextToken',],],], 'MaxSize' => ['type' => 'integer', 'max' => 100, 'min' => 1,], 'NextToken' => ['type' => 'string', 'max' => 256, 'pattern' => '.*',], 'PreCoPassword' => ['type' => 'string', 'max' => 32, 'min' => 7,], 'SecurityGroup' => ['type' => 'string', 'pattern' => 'sg-[0-9a-fA-F]',], 'StateMessage' => ['type' => 'string', 'max' => 300, 'pattern' => '.*',], 'String' => ['type' => 'string',], 'Strings' => ['type' => 'list', 'member' => ['shape' => 'String',],], 'SubnetId' => ['type' => 'string', 'pattern' => 'subnet-[0-9a-fA-F]{8}',], 'SubnetIds' => ['type' => 'list', 'member' => ['shape' => 'SubnetId',], 'max' => 10, 'min' => 1,], 'Tag' => ['type' => 'structure', 'required' => ['Key', 'Value',], 'members' => ['Key' => ['shape' => 'TagKey',], 'Value' => ['shape' => 'TagValue',],],], 'TagKey' => ['type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$',], 'TagKeyList' => ['type' => 'list', 'member' => ['shape' => 'TagKey',], 'max' => 50, 'min' => 1,], 'TagList' => ['type' => 'list', 'member' => ['shape' => 'Tag',], 'max' => 50, 'min' => 1,], 'TagResourceRequest' => ['type' => 'structure', 'required' => ['ResourceId', 'TagList',], 'members' => ['ResourceId' => ['shape' => 'ClusterId',], 'TagList' => ['shape' => 'TagList',],],], 'TagResourceResponse' => ['type' => 'structure', 'members' => [],], 'TagValue' => ['type' => 'string', 'max' => 256, 'min' => 0,], 'Timestamp' => ['type' => 'timestamp',], 'UntagResourceRequest' => ['type' => 'structure', 'required' => ['ResourceId', 'TagKeyList',], 'members' => ['ResourceId' => ['shape' => 'ClusterId',], 'TagKeyList' => ['shape' => 'TagKeyList',],],], 'UntagResourceResponse' => ['type' => 'structure', 'members' => [],], 'VpcId' => ['type' => 'string', 'pattern' => 'vpc-[0-9a-fA-F]',], 'errorMessage' => ['type' => 'string',],],];
