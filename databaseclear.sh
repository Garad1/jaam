curl -XDELETE 'http://localhost:9200/nodes'
curl -XDELETE 'http://localhost:9200/nodes-cache'
curl -XDELETE 'http://localhost:9200/relations'
curl -XDELETE 'http://localhost:9200/relations-type'

curl -XPUT 'http://localhost:9200/nodes' -d '{
"settings": {
  "number_of_shards": 1,
  "analysis": {
    "filter": {
      "autocomplete_filter": {
        "type":     "edge_ngram",
        "min_gram": 1,
        "max_gram": 20
      }
    },
    "analyzer": {
      "autocomplete": {
        "type":      "custom",
        "tokenizer": "standard",
        "filter": [
          "lowercase",
          "autocomplete_filter"
        ]
      }
    }
  }
},
"mappings": {
    "node":{
        "dynamic": "strict",
        "properties":{
            "id":{ "type": "integer"  },
            "name": {
              "type":"keyword",
              "fields":{
                "autocomplete":{
                    "type": "text",
                    "analyzer": "autocomplete",
                    "search_analyzer": "standard"
                }
              }
            },
            "formattedName": {
              "type":"keyword",
              "fields":{
                "autocomplete":{
                    "type": "text",
                    "analyzer": "autocomplete",
                    "search_analyzer": "standard"
                }
              }
            },
            "description":{ "type": "text", "index": false },
            "weight":{ "type": "integer"  },
            "nodeType": { "type": "integer" }
            }
        }
    }
}'

curl -XPUT 'http://localhost:9200/relations' -d '{
  "settings": {
    "number_of_shards": 1,
    "analysis": {
      "filter": {
        "autocomplete_filter": {
          "type":     "edge_ngram",
          "min_gram": 1,
          "max_gram": 20
        }
      },
      "analyzer": {
        "autocomplete": {
          "type":      "custom",
          "tokenizer": "standard",
          "filter": [
            "lowercase",
            "autocomplete_filter"
          ]
        }
      }
    }
  },
  "mappings": {
    "relation-in": {
      "dynamic": "strict",
      "properties": {
        "id": {"type": "integer"},
        "idRelationType": {"type": "integer"},
        "idNode": {"type": "integer"},
        "weight": {"type": "integer"},
        "node": {
          "type": "object",
          "properties": {
            "id": {"type": "integer"},
            "name": {
              "type":"keyword",
              "fields":{
                "autocomplete":{
                  "type": "text",
                  "analyzer": "autocomplete",
                  "search_analyzer": "standard"
                }
              }
            },
            "formattedName": {
              "type":"keyword",
              "fields":{
                "autocomplete":{
                  "type": "text",
                  "analyzer": "autocomplete",
                  "search_analyzer": "standard"
                }
              }
            },
            "weight": {"type": "integer"},
            "nodeType": {"type": "integer"}
          }
        }
      }
    },
    "relation-out": {
      "dynamic": "strict",
      "properties": {
        "id": {"type": "integer"},
        "idRelationType": {"type": "integer"},
        "idNode": {"type": "integer"},
        "weight": {"type": "integer"},
        "node": {
          "type": "object",
          "properties": {
            "id": {"type": "integer"},
            "name": {
              "type":"keyword",
              "fields":{
                "autocomplete":{
                  "type": "text",
                  "analyzer": "autocomplete",
                  "search_analyzer": "standard"
                }
              }
            },
            "formattedName": {
              "type":"keyword",
              "fields":{
                "autocomplete":{
                  "type": "text",
                  "analyzer": "autocomplete",
                  "search_analyzer": "standard"
                }
              }
            },
            "weight": {"type": "integer"},
            "nodeType": {"type": "integer"}
          }
        }
      }
    }
  }
}'

curl -XPUT 'http://localhost:9200/nodes-cache' -d '{
  "mappings": {
    "node-cache": {
      "dynamic": "strict",
      "properties": {
        "id": {"type": "integer"},
        "name": {"type": "keyword"},
        "description": {"type": "text", "index": false},
        "formattedName": {"type": "keyword"},
        "weight": {"type": "integer"},
        "nodeType": {"type": "integer"},
        "timestamp": { "type": "date" },
        "relationTypes": {
          "type": "nested",
          "properties": {
            "id": {"type": "integer"},
            "code": {"type": "keyword"},
            "name": {"type": "keyword"},
            "description": {"type": "text"},
            "relations": {
              "properties": {
                "in": {
                  "type": "nested",
                  "properties": {
                    "id": {"type": "integer"},
                    "weight": {"type": "integer"},
                    "node": {
                      "properties": {
                        "id": {"type": "integer"},
                        "name": {"type": "keyword"},
                        "formattedName": {"type": "keyword"},
                        "weight": {"type": "integer"},
                        "nodeType": {"type": "integer"}
                      }
                    }
                  }
                },
                "out": {
                  "type": "nested",
                  "properties": {
                    "id": {"type": "integer"},
                    "weight": {"type": "integer"},
                    "node": {
                      "properties": {
                        "id": {"type": "integer"},
                        "name": {"type": "keyword"},
                        "formattedName": {"type": "keyword"},
                        "weight": {"type": "integer"},
                        "nodeType": {"type": "integer"}
                      }
                    }
                  }
                }
              }
            }
          }
        },
        "nodeTypes": {
          "type": "nested",
          "properties": {
            "id": {"type": "integer"},
            "name": {"type": "text"}
          }
        }
      }
    }
  }
}'

curl -XPUT 'http://localhost:9200/relations-type' -d '{
    "mappings": {
        "relation-type":{
            "dynamic": "strict",
            "properties": {
                "id": {"type": "integer"},
                "code": {"type": "keyword"},
                "name": {"type": "keyword"},
                "description": {"type": "text"}
            }
       }
    }
}'