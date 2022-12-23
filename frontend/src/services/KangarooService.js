import http from '../api'

class KangarooService {
  getAll () {
    return http.get('/kangaroo')
  }

  get (id) {
    return http.get(`/kangaroo/${id}`)
  }

  create (data) {
    return http.post('/kangaroo', data)
  }

  update (id, data) {
    return http.put(`/kangaroo/${id}`, data)
  }

  delete (id) {
    return http.delete(`/kangaroo/${id}`)
  }
}

export default new KangarooService()
